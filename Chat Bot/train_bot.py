# Shalini Sharma
# Chat bot Project
import nltk
nltk.download('punkt')
nltk.download('wordnet')
from nltk.stem import WordNetLemmatizer
lemmatizer = WordNetLemmatizer()
import json
import pickle
import random
import numpy as np
from keras.models import Sequential
from keras.layers import Dense,Activation,Dropout
from tensorflow.keras.optimizers import SGD


words = []
classes=[]
documents=[]
ignore_words= ["?","!","."]
data_file= open('intents.json').read()
intents= json.loads(data_file)
# print(intents)

for intent in intents['intents']:
    for pattern in intent['patterns']:
        #tokenize here
        w=nltk.word_tokenize(pattern)
        # print("Token is: {}".format(w))
        words.extend(w)
        # (['hey'],['you'],'greeting')
        # documents[0] = 'hey', ['you']  and  documents[1] = 'greeting'
        documents.append((w,intent['tag']))
        # add the tag to classes list
        if intent["tag"] not in classes:
            classes.append(intent["tag"])
    #final lists
    # print("Word list is: {}".format(words))
    # print("Docs are: {}".format(documents))
    # print("Classes are: {}".format(classes))

words = [lemmatizer.lemmatize(w.lower()) for w in words if w not in ignore_words]
words = list(set(words))    # to avoid duplicate words
classes = list(set(classes))
# print(words)

pickle.dump(words,open('words.pkl','wb'))
pickle.dump(classes, open('classes.pkl','wb'))

training = []
output_empty = [0]*len(classes)
# [0,0,0,0,0,0,0]
for doc in documents:
    bag= []
    pattern_words = doc[0]
    pattern_words = [lemmatizer.lemmatize(word.lower()) for word in pattern_words]
    # print("pattern words: {}".format(pattern_words))

    for w in words:
        bag.append(1) if w in pattern_words else bag.append(0)

    # print('Current bag : {}'.format(bag))
    output_row =list(output_empty)
    output_row[classes.index(doc[1])]=1
    # print("current output: {}".format(output_row))

    training.append([bag,output_row])

random.shuffle(training)
training = np.array(training,dtype=object)

train_x = list(training[:,0])
train_y = list(training[:,1])

print("X : {}".format(train_x))
print("Y : {}".format(train_y))

model = Sequential()
model.add(Dense(128, input_shape=(len(train_x[0]),), activation='relu'))
model.add(Dropout(0.5))
model.add(Dense(64, activation='relu'))
model.add(Dropout(0.5))
model.add(Dense(len(train_y[0]), activation='softmax'))

# compiling the model & define an optimizer function
sgd = SGD(lr=0.01, decay=1e-6, momentum=0.9, nesterov=True)
model.compile(loss='categorical_crossentropy',optimizer=sgd, metrics=['accuracy'])

mfit = model.fit(np.array(train_x), np.array(train_y), epochs=200, batch_size=5, verbose=1)
model.save('chatbot_model.h5', mfit)

print('Yay! created my first model')



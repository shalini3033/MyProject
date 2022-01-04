#Importing the dataset
dataset = read.csv("C:/Users/Sachin/Desktop/Shalini/R programs/heart.csv")
dataset

# Encoding categorical data
dataset$Sex = factor(dataset$Sex,
                     levels = c('1', '0'),
                     labels = c(1, 0))
dataset$num = factor(dataset$num,
                     levels = c('0', '1','2','3','4'),
                     labels = c(0, 1, 2, 3, 4))
dataset$chesp.pain.type = factor(dataset$chesp.pain.type,
                                 levels = c('1','2','3','4'),
                                 labels = c(1, 2, 3, 4))
dataset$fasting.blood.sugar = factor(dataset$fasting.blood.sugar,
                                     levels = c('0', '1'),
                                     labels = c(0, 1))
dataset$exercise.induced.angina = factor(dataset$exercise.induced.angina,
                                         levels = c('0', '1'),
                                         labels = c(0, 1))
dataset$electrocardiographic = factor(dataset$electrocardiographic,
                                      levels = c('0', '1','2'),
                                      labels = c(0, 1,2))
dataset$slope.of.peak.exercise = factor(dataset$slope.of.peak.exercise,
                                        levels = c('1','2','3'),
                                        labels = c(1,2,3))
dataset$thal = factor(dataset$electrocardiographic,
                      levels = c('0','1','2'),
                      labels = c(0,1,2))

#Splitting the dataset into training and test set

library(caTools)
set.seed(1200000) 
split = sample.split(dataset$num, SplitRatio = 0.63)
training_set = subset(dataset, split == TRUE)
test_set = subset(dataset, split == FALSE)


#Feature scaling
training_set[,c(1,4,5,8,10,12)] = scale(training_set[,c(1,4,5,8,10,12)])
test_set[,c(1,4,5,8,10,12)] = scale(test_set[,c(1,4,5,8,10,12)])


# Fitting Decision Tree Classification to the Training set

library(rpart)
classifier = rpart(formula = num ~ ., control= rpart.control(minsplit = 20, cp = 0.01, maxdepth= 30),
                   data = training_set)

# Predicting the Test set results
y_pred = predict(classifier, newdata = test_set[-14], type = 'class')
y_pred

#C50_model<-C5.0(training_set[,-14],training_set[,-14],trials= 10)

# Making the Confusion Matrix
cm = table(test_set[, 14], y_pred)
cm
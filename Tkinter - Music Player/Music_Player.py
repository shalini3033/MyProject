# 1913109_Riya , 1913113_Jainam , 1913116_Shalini
# Problem Statement: Music player from the given folder
from tkinter import *
from tkinter import filedialog
from pygame import mixer
import pygame


class MusicPlayer:
    def __init__(self, window ):
        window.geometry('320x100'); window.title('Music Player'); window.resizable(0,0)
        Load = Button(window, text = 'Load',  width = 10, font = ('Times', 10), command = self.load)
        Play = Button(window, text = 'Play',  width = 10,font = ('Times', 10), command = self.play)
        Pause = Button(window, width=10, font = ('Times', 10), text='PAUSE', command =self.pause)
        Stop = Button(window ,text = 'Stop',  width = 5, font = ('Times', 10), command = self.stop)
        Load.place(x=0,y=20);Play.place(x=110,y=20);Pause.place(x=220,y=20);Stop.place(x=110,y=60)
        self.music_file = False
        self.playing_state = False
    def load(self):
        self.music_file = filedialog.askopenfilename()
    def play(self):
        if self.music_file:
            mixer.init()
            mixer.music.load(self.music_file)
            mixer.music.play()

    def pause(self):
        pygame.mixer.music.pause()

    def stop(self):
        mixer.music.stop()
root = Tk()
app= MusicPlayer(root)
root.mainloop()

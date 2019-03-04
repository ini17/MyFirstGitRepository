import pygame
import sys
import random


class Bird(object):
    def __init__(self):
        self.birdRect = pygame.Rect(65, 50, 50, 50)
        self.birdStatus = [pygame.image.load(r'D:\360安全浏览器下载\1\flappybird\bird0_0.png'),
                           pygame.image.load(r'D:\360安全浏览器下载\1\flappybird\bird0_1.png'),
                           pygame.image.load(r'D:\360安全浏览器下载\1\flappybird\bird0_2.png')]
        self.Status = 0
        self.birdX = 120
        self.birdY = 350
        self.jump = False
        self.jumpSpeed = 10
        self.gravity = 5
        self.Dead = False

    def birdUpdate(self):
        if self.jump:
            self.jumpSpeed -= 1
            self.birdY -= self.jumpSpeed
        else:
            self.gravity += 0.05
            self.birdY += self.gravity
        self.birdRect[1] = self.birdY


class Pipeline(object):
    def __init__(self):
        self.wallx = 400
        self.pipeUp = pygame.image.load(r'D:\360安全浏览器下载\1\flappybird\pipe_down.png')
        self.pipeDown = pygame.image.load(r'D:\360安全浏览器下载\1\flappybird\pipe_up.png')

    def updatePipeline(self):
        if not Bird.Dead:
            self.wallx -= 4
        if self.wallx < -80:
            global score
            score += 1
        if self.wallx < -80:
            self.wallx = 400
            global randomPipe
            randomPipe = True


def createMap():
    global randomPipe
    global number
    if randomPipe:
        number = random.randint(-300, 0)
        randomPipe = False
    color = (255, 255, 255)
    screen.fill(color)
    screen.blit(background, (0, 0))
    screen.blit(Pipeline.pipeUp, (Pipeline.wallx, number))
    screen.blit(Pipeline.pipeDown, (Pipeline.wallx, number + 550))
    screen.blit(font.render('Score:'+str(score), -1, (255, 255, 255)), (25, 25))
    Pipeline.updatePipeline()
    if Bird.Dead:
        Bird.Status = 2
    elif Bird.jump:
        Bird.Status = 1
    screen.blit(Bird.birdStatus[Bird.Status], (Bird.birdX, Bird.birdY))
    Bird.birdUpdate()
    pygame.display.update()


def checkDead():
    upRect = pygame.Rect(Pipeline.wallx, number, Pipeline.pipeUp.get_width(), Pipeline.pipeUp.get_height())
    downRect = pygame.Rect(Pipeline.wallx, number + 550, Pipeline.pipeDown.get_width(), Pipeline.pipeDown.get_height())
    if upRect.colliderect(Bird.birdRect) or downRect.colliderect(Bird.birdRect):
        Bird.Dead = True
        return True
    if not 0 < Bird.birdRect[1] < height:
        Bird.Dead = True
        return True
    else:
        return False


def getResult():
    final_text1 = "Game Over"
    final_text2 = "Final Score is:  " + str(score)
    ft1_font = pygame.font.SysFont("Arial", 20)
    ft1_surf = font.render(final_text1, -1, (242, 3, 36))
    ft2_font = pygame.font.SysFont("Arial", 40)
    ft2_surf = font.render(final_text2, -1, (253, 177, 6))

    # screen.blit(ft1_surf, [screen.get_width()/2 - ft1_surf.get_width()/2, 100])
    # screen.blit(ft2_surf, [screen.get_width()/2 - ft1_surf.get_width()/2, 200])
    screen.blit(ft1_surf, [0, 100])
    screen.blit(ft2_surf, [0, 200])
    pygame.display.flip()


if __name__ == '__main__':
    pygame.init()
    pygame.font.init()
    font = pygame.font.SysFont(None, 50)
    size = width, height = 288, 512
    screen = pygame.display.set_mode(size)
    pygame.display.set_caption("Flappy Bird")
    randomPipe = True
    number = 0
    clock = pygame.time.Clock()
    Pipeline = Pipeline()
    Bird = Bird()
    score = 0
    while True:
        clock.tick(40)
        for event in pygame.event.get():
            if event.type == pygame.QUIT:
                sys.exit()
            if (event.type == pygame.KEYDOWN or event.type == pygame.MOUSEBUTTONDOWN) and not Bird.Dead:
                Bird.jump = True
                Bird.gravity = 5
                Bird.jumpSpeed = 10
        background = pygame.image.load(r'D:\360安全浏览器下载\1\flappybird\bg_day.png')
        if checkDead():
            getResult()
        else:
            createMap()
        createMap()
    pygame.quit()

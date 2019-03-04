import sys
import pygame
import random


pygame.init()
size = width, height = 640, 480
screen = pygame.display.set_mode(size)
pygame.display.set_caption("弹弹球")
color = (255, 255, 255)

ball = pygame.image.load("D:/PycharmProjects/Myself Python Codes/Pygame Try/ball.jpg")
# ball = pygame.transform.flip(ball, True, True)                    实现图片的翻转，参数1：左右，参数2：上下
ballrect = ball.get_rect()

speed = [random.randint(0, 5),random.randint(0, 5)]
clock = pygame.time.Clock()
d = 0.0

while True:
    clock.tick(60)
    for event in pygame.event.get():
        if event.type == pygame.QUIT:
            sys.exit()
    # ball = pygame.transform.rotate(ball, d % 360)
    # ballrect = ball.get_rect()
    # d -= 0.1
    ballrect = ballrect.move(speed)
    if ballrect.right > width:
        speed = [-random.randint(0, 5), random.randint(-5, 5)]
    if ballrect.bottom > height:
        speed = [random.randint(-5, 5), -random.randint(0, 5)]
    if ballrect.left < 0 or ballrect.top < 0:
        speed = [random.randint(0, 5), random.randint(0, 5)]
    screen.fill(color)
    screen.blit(ball, ballrect)
    pygame.display.flip()

pygame.quit()
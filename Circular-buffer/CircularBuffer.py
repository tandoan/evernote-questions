class CircularBuffer:
    def __init__(self, size):
        self.size = size
        self.count = 0
        self.head = 0
        self.elements = {}

    def isFull(self):
        return self.count == self.size

    def isEmpty(self):
        return 0 == self.count

    def append(self, inputElement):
        if (self.size > 0):
            tail = (self.head + self.count) % self.size 
            self.elements[tail] = inputElement

            #if buffer is full, move head foward
            if(self.isFull()):
                self.head = (self.head + 1) % self.size
            else:
                self.count = self.count + 1

    def remove(self, num):
        if self.size > 0:
            self.head = (self.head + num) % self.size
            self.count = self.count - num

    def printElements(self):
        if self.size > 0:
            i = 0
            readIndex = self.head
            while (i < self.count):
                print(self.elements[readIndex])
                readIndex = (readIndex +1) % self.size
                i = i+1

class Driver:
    def execute(self):
        size = int(raw_input())
        cb = CircularBuffer(size)

        while (True):
            line = raw_input()
            if ('A' == line[0]):
                num = int(line[2:])
                i = 0
                while(i < num):
                    cb.append(raw_input())
                    i = i+1
            elif ('R' == line[0]):
                num = int(line[2:])
                cb.remove(num)
            elif ('L' == line[0]):
                cb.printElements()
            elif('Q' == line[0]):
                quit()
               

d = Driver()
d.execute()

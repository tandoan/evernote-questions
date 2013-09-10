numbers = []
leftProducts = []

numLines = int(raw_input())
leftProducts.insert(0,1)

runCount = numLines + 1

# store the original numbers, and the products from left to right
for i in range(1, runCount):
	inputNumber = int(raw_input())
	leftProducts.insert(i, leftProducts[i-1]*inputNumber)
	numbers.append(inputNumber)

# now go from right to left, multiplying the the numbers by the right products
rightProducts = 1
for i in range(numLines-2, -1, -1):
	rightProducts = rightProducts * numbers[i+1]
	leftProducts[i] = leftProducts[i] * rightProducts

# last number is unnecessary
leftProducts.pop()

for elem in leftProducts:
	print elem
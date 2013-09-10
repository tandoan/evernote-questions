numLines = int(raw_input())
lines = []

# if less than 4 lines, read everything in
if 4>= numLines:
	for i in range(0, numLines):
		lines.append(int(raw_input()))
else:
# else keep only the top 4
	diff = numLines - 4
	for i in range(0, 4):
		lines.append(int(raw_input()))
	
	for i in range(0, diff):
		newInput = int(raw_input())
		minValue = min(lines)
		if newInput > minValue:
			key = lines.index(minValue)
			lines[key] = newInput


lines.sort(reverse=True)

for l in lines:
	print l
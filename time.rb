require 'date'
stdin = STDIN.gets
str = stdin.split(' ')
start_str = str[0]
finish_str = str[1]
start = DateTime.parse(start_str)
finish = DateTime.parse(finish_str)
time = finish - start
puts time * 24.0

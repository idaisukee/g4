require 'date'
stdin = STDIN.gets.strip
str = stdin.split(' ')
summary = str[0]
start_str = str[1]
finish_str = str[2]
start = DateTime.parse(start_str)
finish = DateTime.parse(finish_str)
time = finish - start
time_str = (time * 24.0).to_s
puts summary + ' ' + time_str

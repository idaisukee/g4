require 'date'

line = STDIN.gets.strip
array = line.split(',')

subject = array[0]
month = array[1]
day = array[2]
frame = array[3]
topic = array[4]
dept = array[5]
position = array[6]
person = array[7]

if month.to_i < 10 then
	year = '2017'
else
	year = '2016'
end

date = Date.new(year.to_i, month.to_i, day.to_i)
datestr = date.strftime('%Y-%m-%d')

puts "#{datestr},#{frame},#{subject},#{topic},#{dept},#{position},#{person}"

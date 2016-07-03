# -*- coding: utf-8 -*-
require 'date'
now = DateTime.now
year = now.year
month = now.month

day = STDIN.gets.strip.to_i

full_day = DateTime.new(year, month, day)

if full_day.wday == 5
	time = '17:00,22:00'
else
	time = '17:00,21:00'
end
puts "#{year},#{month},#{day},#{time},井上出社日,,il"


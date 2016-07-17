# -*- coding: utf-8 -*-
require 'date'
now = DateTime.now
year = now.year
month = now.month

day = STDIN.gets.strip.to_i

full_day = DateTime.new(year, month, day)




if Range.new(1, 5).include? full_day.wday then

	if full_day.wday == 5 then
		time = '10:00,16:00'
		puts "#{year},#{month},#{day},#{time},井上出社日,,il"
		time = '19:00,22:00'
		puts "#{year},#{month},#{day},#{time},井上出社日,,il"
	else
		time = '10:00,19:00'
		puts "#{year},#{month},#{day},#{time},井上出社日,,il"
	end

	
end

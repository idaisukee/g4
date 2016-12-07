file = ENV['PRD'] + '/dat/cbt/cbt.dat'
total = 68


ar = Array.new
sum = 0.0
ratio_sum = 0
File.open(file) do |file|
	file.each_line do |line|
		child_ar =  line.split(' ')
		ar << child_ar
		time = child_ar[1].to_f
		sum += time
	end
end

ar.each do |line|
	time = line[1].to_f
	ratio = time / sum
	ratio_sum += ratio
	puts \
	[
	 line[0],
	 (line[0].to_i + 9).to_s,
	 time,
	 ratio,
	 ratio_sum,
	 total * ratio_sum
	].join(' ')
end

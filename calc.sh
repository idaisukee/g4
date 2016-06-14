#!/bin/sh
dir=`pwd`
Q=$1
m=$2
cd $PRD/src/g4
php list.php 2> /dev/null -q $Q -m $m -n pri | cut -d' ' -f 3 | while read line; do echo $line| php get.php 2> /dev/null | cut -d ' ' -f3,4 ;done  | while read line; do echo $line | ruby time.rb; done | xargs | sed 's/ /+/g' | bc
cd $dir

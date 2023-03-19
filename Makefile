build: composer.phar
	@php composer.phar install

composer.phar:
	@php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
	@php -r "if (hash_file('sha384', 'composer-setup.php') === '55ce33d7678c5a611085589f1f3ddf8b3c52d662cd01d4ba75c0ee0459970c2200a51f492d557530c71c15d8dba01eae') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
	@php composer-setup.php
	@php -r "unlink('composer-setup.php');"

test:
	@php ./test.php

antOnCenter15s:
	@php disect-probability.php --insect=ant --board=FiveByFive --time=15s --endProbability="[[3,3]]"

antOnBorder1h:
	@php disect-probability.php --insect=ant --board=FiveByFive --time=1h --endProbability="[[1,1],[1,2],[1,3],[1,4],[1,5],[2,1],[3,1],[4,1],[5,1],[5,2],[5,3],[5,4],[5,5],[4,5],[3,5],[2,5]]"

beetleOnCenter15s:
	@php disect-probability.php --insect=beetle --board=FiveByFive --time=15s --endProbability="[[3,3]]"

beetleOnBorder1h:
	@php disect-probability.php --insect=beetle --board=FiveByFive --time=1h --endProbability="[[1,1],[1,2],[1,3],[1,4],[1,5],[2,1],[3,1],[4,1],[5,1],[5,2],[5,3],[5,4],[5,5],[4,5],[3,5],[2,5]]"

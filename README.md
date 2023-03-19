# Arthro-prob

## Install
Generate the autoloader. The latest composer will be used.
```bash
make build
```

## Running

### Program
Running the program using php, or a makefile command.

Chance of an Ant being on the center of a 5x5 board after 15s
```bash
php disect-probability.php --insect=ant --board=FiveByFive --time=15s --endProbability="[[3,3]]"
```
OR
```bash
make antOnCenter15s
```

Chance of an Ant being on the border of a 5x5 board after 1h
```bash
php disect-probability.php --insect=ant --board=FiveByFive --time=1h --endProbability="[[1,1],[1,2],[1,3],[1,4],[1,5],[2,1],[3,1],[4,1],[5,1],[5,2],[5,3],[5,4],[5,5],[4,5],[3,5],[2,5]]"
```
OR
```
make antOnBorder1h
```

### Tests
```bash
make test
```

## Contributing

### New Board

### New Arthropod


## Design

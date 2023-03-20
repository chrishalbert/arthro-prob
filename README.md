# Arthro-prob

## Install
Generate the autoloader. The latest composer will be used.
```bash
make build
```

### Tests
```bash
make test
```

## Running

### Program
Running the program using php, or a makefile command.

#### Case 1: Chance of an Ant being on the center of a 5x5 board after 15s
```bash
php disect-probability.php --insect=ant --board=FiveByFive --time=15s --endProbability="[[3,3]]"
```
OR
```bash
make antOnCenter15s
```

#### Case 2: Chance of an Ant being on the border of a 5x5 board after 1h
```bash
php disect-probability.php --insect=ant --board=FiveByFive --time=1h --endProbability="[[1,1],[1,2],[1,3],[1,4],[1,5],[2,1],[3,1],[4,1],[5,1],[5,2],[5,3],[5,4],[5,5],[4,5],[3,5],[2,5]]"
```
OR
```
make antOnBorder1h
```

#### Case 3: Chance of a beetle being on the center of a 5x5 board after 15s
```bash
php disect-probability.php --insect=beetle --board=FiveByFive --time=15s --endProbability="[[3,3]]"
```
OR
```bash
make beetleOnCenter15s
```

#### Case 4: Chance of a Beetle being on the border of a 5x5 board after 1h
```bash
php disect-probability.php --insect=beetle --board=FiveByFive --time=1h --endProbability="[[1,1],[1,2],[1,3],[1,4],[1,5],[2,1],[3,1],[4,1],[5,1],[5,2],[5,3],[5,4],[5,5],[4,5],[3,5],[2,5]]"
```
OR
```
make beetleOnBorder1h
```

#### Visualization
After generating the 1hr results, I was a little uncertain. Then I started thinking about what seems to be happening. It's
almost as though someone drops a 100ml cylinder of water in the center square, which wavers back and forth, such that the 
probability is the height of the wave bouncing between walls. Over the course of time, the water settles to a flat position,
which is how I rationalized the converging behavior of the equal distribution. The beetle on the other hand does the same 
thing, however I imagine the wave not being able to complete a full cycle (like a sin curve), between each position. 

Regardless, I thought it would be interesting to view this so I constructed a visualization with a couple of make commands,
that changes the board every 1000ms. Feel free to play with the `--visualizationMs` param.

```bash
make antOnCenter15sWithVisualization
```

```bash
make beetleOnCenter15sWithVisualization
```


# LeetCode challenges - solving problems

Sample problem-solving using php

## Problem of the day
1. Number of 1 Bits

Write a function that takes the binary representation of an unsigned integer and returns the number of '1' bits it has (also known as the Hamming weight).

Note:

- Note that in some languages, such as Java, there is no unsigned integer type. In this case, the input will be given as a signed integer type.
- It should not affect your implementation, as the integer's internal binary representation is the same, whether it is signed or unsigned.
  In Java, the compiler represents the signed integers using 2's complement notation. Therefore, in Example 3, the input represents the signed integer. -3.

Example 1:
```
Input: n = 00000000000000000000000000001011
Output: 3
Explanation: The input binary string 00000000000000000000000000001011 has a total of three '1' bits.
```

Example 2:

```
Input: n = 00000000000000000000000010000000
Output: 1
Explanation: The input binary string 00000000000000000000000010000000 has a total of one '1' bit.

```

Example 3:
```
Input: n = 11111111111111111111111111111101
Output: 31
Explanation: The input binary string 11111111111111111111111111111101 has a total of thirty one '1' bits.
```


Constraints:

    The input must be a binary string of length 32.

1845. Seat Reservation Manager

Design a system that manages the reservation state of n seats that are numbered from 1 to n.

Implement the SeatManager class:

    - SeatManager(int n) Initializes a SeatManager object that will manage n seats numbered from 1 to n. All seats are initially available.
    - int reserve() Fetches the smallest-numbered unreserved seat, reserves it, and returns its number.
    - void unreserve(int seatNumber) Unreserves the seat with the given seatNumber.

Example 1:
```
Input
["SeatManager", "reserve", "reserve", "unreserve", "reserve", "reserve", "reserve", "reserve", "unreserve"]
[[5], [], [], [2], [], [], [], [], [5]]
Output
[null, 1, 2, null, 2, 3, 4, 5, null]
```

815. Bus Routes

You are given an array routes representing bus routes where routes[i] is a bus route that the ith bus repeats forever.

    For example, if routes[0] = [1, 5, 7], this means that the 0th bus travels in the sequence 1 -> 5 -> 7 -> 1 -> 5 -> 7 -> 1 -> ... forever.

You will start at the bus stop source (You are not on any bus initially), and you want to go to the bus stop target. You can travel between bus stops by buses only.

Return the least number of buses you must take to travel from source to target. Return -1 if it is not possible.


Example 1:

Input: routes = [[1,2,7],[3,6,7]], source = 1, target = 6
Output: 2
Explanation: The best strategy is take the first bus to the bus stop 7, then take the second bus to the bus stop 6.

Example 2:

Input: routes = [[7,12],[4,5,15],[6],[15,19],[9,12,13]], source = 15, target = 12
Output: -1

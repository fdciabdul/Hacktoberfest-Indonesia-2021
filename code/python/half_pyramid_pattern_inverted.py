def half_pyramid_pattern_inverted(rows):
    for x in range(rows,0, -1):
       for j in range(x):
          print("*", end=" ")
       print()
half_pyramid_pattern_inverted(5)
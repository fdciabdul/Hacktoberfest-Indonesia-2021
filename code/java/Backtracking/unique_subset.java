/*package whatever //do not write package name here */

import java.io.*;
import java.util.*;

class Unique_subset {
	public static void
	findSubsets(List<List<Integer>> subset, ArrayList<Integer> nums, ArrayList<Integer> output, int index)
	{
	// Base Condition
		if (index == nums.size()) {
			subset.add(output);
			return;
		}
	
		// Not Including Value which is at Index
		findSubsets(subset, nums, new ArrayList<>(output), index + 1);

		// Including Value which is at Index
		output.add(nums.get(index));
		findSubsets(subset, nums, new ArrayList<>(output), index + 1);
	}

	public static void main(String[] args) {
	
	//Main List for storing all subsets
	List<List<Integer>> subset = new ArrayList<>();
	
	// Input ArrayList
	ArrayList<Integer> input = new ArrayList<>();
	input.add(1);
	input.add(2);
	input.add(3);
	
	findSubsets(subset, input, new ArrayList<>(), 0);

	// Comparator is used so that all subset get
	// sorted in ascending order of values
		Collections.sort(subset, (o1, o2) -> {
			int n = Math.min(o1.size(), o2.size());
			for (int i = 0; i < n; i++) {
				if (o1.get(i) == o2.get(i)){
					continue;
				}else{
					return o1.get(i) - o2.get(i);
				}
			}
			return 1;
		});
	
	
	// Printing Subset
	for(int i = 0; i < subset.size(); i++){
		for(int j = 0; j < subset.get(i).size(); j++){
			System.out.print(subset.get(i).get(j) + " ");
		}
		System.out.println();
	}
	
	}
}
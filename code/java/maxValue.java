
import java.util.*;

public class maxValue{
	public static void main(String[] args){
		
		//creating Scanner object to read input from the user
		Scanner input = new Scanner(System.in);
		
		//assigning first number to variable 'max'
		System.out.print("Enter numbers: ");
		int max = input.nextInt();
		int count = 1;
		
		//declaring a temporary variable for next numbers
		int temp;
		do{	
			//storing the next numbers in temp
			temp = input.nextInt();
			
			//incrementing the count if the entered number is equal to max number
			if(temp == max)
				count++;
			
			//checking if the entered number is greater than max number
			if(temp > max){
				max = temp;
				count = 1;
			}		
		}while(temp != 0);
		
		if(max == 0)
			System.out.print("Please enter numbers other than zero");
		else{
			System.out.println("The largest number is "+max);
			System.out.println("The occurrence count of the largest number is "+count);
		}
	}
}

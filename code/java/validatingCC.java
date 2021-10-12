
import java.util.*;

public class validatingCC{
	public static void main(String[] args){
		System.out.print("Enter a credit card number as a long integer: ");
		
		//creating Scanner object to read input from the user
		Scanner sc = new Scanner(System.in); 
		long cardNum = sc.nextLong();
        boolean isValid = isValid(cardNum);
		if(isValid)
			System.out.println(cardNum+" is valid");
		else
			System.out.println(cardNum+" is invalid");
	}
	
	/** Returns true if the card number is valid */
	public static boolean isValid(long cardNum){
	    int size = getSize(cardNum);
		int prefix = (int)(cardNum / (long) (Math.pow(10.0, (double) (size - 1))));
		
		//Checking if the card number starts with 4, 5, 6 and 37
		if(prefix != 4 && prefix != 5 && prefix != 6){
			if(prefix == 3)
				prefix = (int)(cardNum / (long) (Math.pow(10.0, (double) (size - 2))));
			if(prefix != 7)
				return false;
		}
		int value = (sumOfOddPlace(cardNum) + sumOfDoubleEvenPlace(cardNum))%10;
	    if(value != 0)
			return false;
	    return true;
	   }
	   
	/** Get the result from Step 2 */
	public static int sumOfDoubleEvenPlace(long number){
		int n = getSize(number);
		int doubleEvenSum = 0;
		for (int i = 2; i <= n; i += 2){
			int digit = (int)(((number / Math.pow(10, i - 1))) % 10);
			doubleEvenSum += getDigit(2 * digit);
		}
		return doubleEvenSum;
	 
	}
	
	/** Return this number if it is a single digit, otherwise,
	 * return the sum of the two digits */
	public static int getDigit(int number){
		int digit1 = number / 10;
		int digit2 = number % 10;
		if (digit1 == 0)
			return number;
		else
			return digit1 + digit2;
	}
	
	/** Return sum of odd-place digits in number */
	public static int sumOfOddPlace(long number){
		int n = getSize(number);
		int sum = 0;
		for (int i = 1; i <= n; i += 2){
			int digit = (int)(((number / Math.pow(10, i - 1))) % 10);
			sum += digit;
		}
		return sum;
	}
	
	/** Return the number of digits in d */
	public static int getSize(long number){
		int size = 1;
		while ((number = number / 10) != 0)
			size++;
		return size;
	}
}

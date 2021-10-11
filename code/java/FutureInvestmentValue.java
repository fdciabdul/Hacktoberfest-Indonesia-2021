

import java.util.*;	

class FutureInvestmentValue{
	public static void main(String[] args){
		Scanner input = new Scanner(System.in);
		
		//Promtping the user for investment amount and saving it in 'invAmount'
		System.out.print("Enter investment amount: ");
		double invAmount = input.nextDouble();
		
		//Promtping the user for annual interest rate and saving it in 'annIntRate'
		System.out.print("Enter annual interest rate: ");
		double annIntRate = input.nextDouble();
		
		//Calculating monthly interest rate and saving it in 'monIntRate'
		double monIntRate = annIntRate/12;
		
		//Promtping the user for number of years and saving it in 'years'
		System.out.print("Enter number of years: ");
		int years = input.nextInt();
		
		//Calculating the Future Investment Value using the power function in Math class
		//and displaying only first two digits after decimal by truncating the rest
		//using the format function in String class
		double futInvVal = invAmount * Math.pow((1 + monIntRate/100), years*12);
		System.out.print("Accumulated value is "+ String.format("%.2f", futInvVal));
	}
}

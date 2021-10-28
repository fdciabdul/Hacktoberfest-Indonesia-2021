import java.util.Scanner;
class SimpleCalculator{
	public static void main(String[] args){
		int num1, num2;
		char ch;
		Scanner sc = new Scanner(System.in);
		System.out.println("Enter first number: ");
		num1 = sc.nextInt();
		System.out.println("Enter operation: ");
		ch = sc.next().charAt(0);
		System.out.println("Enter second number" );
		num2 = sc.nextInt();
		if(ch == '*')
			System.out.println("Multiplication = "+(num1*num2));
		if(ch == '/')
			System.out.println("Division = "+(num1/num2));
		if(ch == '+')
			System.out.println("Addition = "+(num1+num2));
		if(ch == '-')
			System.out.println("Subtraction = "+(num1-num2));
		
}
}
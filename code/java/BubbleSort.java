import java.util.Scanner;

class Main {
	public static void main (String[] args) {
                      Scanner sc = new Scanner(System.in);
					  int t = sc.nextInt();
					  for(int i = 0; i < t; i++)
					  {
						  int size = sc.nextInt();
						  int[] a = new int[size];
						  for(int j = 0; j < size; j++)
						  {
							  a[j] = sc.nextInt();
						  }
						  for (int j =0; j < size; j++)
						  {
							  for(int k = 0; k < size-j-1; k++)
							  {
								  if(a[k] > a[k+1])
								  {
									  int temp = a[k];
									  a[k] = a[k+1];
									  a[k+1] = temp;
								  }
							  }
						  }
						  for(int j = 0; j < size; j++)
						  {
							  System.out.print(a[j]+" ");
						  }
						  System.out.println();
                         
					  }		
                      sc.close();	         
	}
}
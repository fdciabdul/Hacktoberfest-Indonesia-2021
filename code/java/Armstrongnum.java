package com.company;

import java.util.Scanner;
import java.lang.Math;

public class Armstrongnum {
    public static void main(String[] args) {
        Scanner in = new Scanner(System.in);
        System.out.println("Enter number: ");
        int num = in.nextInt();
        int temp = num;
        int r = 0;
        int sum = 0;
        int n = num;
        int len = 0;


        // To Calculate the length of the given number.
        while (n > 0){
            r = n % 10;
            n /= 10;
            len++;
        }

        // To Calculate the Armstrong Number.
        while (num > 0){
            r = num % 10;
            sum = sum + (int)(Math.pow(r, len));
            num /= 10;
        }

        if(sum == temp){
            System.out.println("It is an Armstrong Number.");
        }
        else{
            System.out.println("Not an Armstrong Number.");
        }
    }
}

package com.art;

import java.util.Arrays;
import java.util.Scanner;

public class ReverseArray {
    public static void main(String[] args) {
        int n;
        Scanner sc = new Scanner(System.in);
        System.out.print("Enter the length of the array: ");
        n = sc.nextInt();

        int[] a = new int[n];
        for(int i = 0; i < n; i++)
        {
            a[i] = sc.nextInt();
        }

        int[] b = new int[n];
        for(int i = 0; i < n; i++)
        {
            b[i] = a[n-i-1];
        }
        System.out.println(Arrays.toString(b));
    }
}

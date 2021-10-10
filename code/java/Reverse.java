package com.company;

import javax.swing.text.AttributeSet;
import java.util.Scanner;

public class Reverse {
    public static void main(String[] args) {
        Scanner in = new Scanner(System.in);
        System.out.println("Enter Word: ");
        String word = in.next();
        int len = word.length();
        String rev = "";

        for(int i = 1; i <= len; i++){
            char l = word.charAt(len-i);
            rev = rev.concat(Character.toString(l));
        }
        System.out.println("The reverse of the string is " + rev);

    }
}

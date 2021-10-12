import java.io.*;
 
class QuickSort{
    

static void swap(int[] arr, int i, int j) {    //  to swap two elements

    int temp = arr[i];
    arr[i] = arr[j];
    arr[j] = temp;
}
 
 
static int partition(int[] arr, int low, int high){
    
    int pivot = arr[high];      
    
    int i = (low - 1);
 
    for(int j = low; j <= high - 1; j++){
        
        if (arr[j] < pivot) {   // If current element is smaller than the pivot
        
            
            i++;
            swap(arr, i, j);
        }
    }
    swap(arr, i + 1, high);
            return (i + 1);
}
 
static void quickSort(int[] arr, int low, int high){
    if (low < high){
        
        int pi = partition(arr, low, high);            // arr[p] is now at right place
 
        quickSort(arr, low, pi - 1);    //  sort elements before partition
        quickSort(arr, pi + 1, high);  // sort elements after partition
    }
}
 
static void printArray(int[] arr, int size){


    for(int i = 0; i < size; i++)
        System.out.print(arr[i] + " ");
        
    System.out.println();
}
 
public static void main(String[] args){
    
    int[] arr = { 45, 56, 37, 79, 46, 18, 90, 81, 51};
    int n = arr.length;
    
    quickSort(arr, 0, n - 1);
    System.out.println("\n\n Sorted array : " );
    printArray(arr, n);
}
}

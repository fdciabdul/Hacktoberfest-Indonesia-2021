public class SearchValueMaxMin {
    public static void main(String[] args) {
        int arr[] = { 111, 44, 5, 3, 43, 6, 7,1,1 };
        int temp = arr[0];
        int temp1 = arr[0];
        for (int i = 0; i < arr.length; i++) {
            if (temp < arr[i]) {
                temp = arr[i];
            }
            if (temp1 > arr[i]) {
                temp1 = arr[i];
            }
        }
        System.out.println("nilai tertinggi : "+temp);
        System.out.println("nilai terendah : "+temp1);
    }
}

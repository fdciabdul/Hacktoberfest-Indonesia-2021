import java.awt.*;               
import java.awt.event.*;
class Swap implements ActionListener{
Button b1;                              
TextField t1,t2;
Label l1,l2;
Frame f;
Swap(){

f = new Frame("Swap Two Numbers by AWT");
l1 =  new Label("First Number :");
l2 =  new Label("Second Number :");

t1 = new TextField();
t2 = new TextField();
b1 = new Button("Swap");
l1.setBounds(10,40,150,30);
f.add(l1);
t1.setBounds(200, 50, 150, 30);
f.add(t1);
l2.setBounds(10,80,170,30);
f.add(l2);
t2.setBounds(200, 90, 150, 30);
f.add(t2);

b1.setBounds(150, 170, 100, 50);
f.add(b1);
b1.addActionListener(this);

Font fo = new Font("candela", Font.BOLD, 20);
l1.setFont(fo);
l2.setFont(fo);
t1.setFont(fo);
t2.setFont(fo);
b1.setFont(fo);


f.addWindowListener(new WindowAdapter() {
public void windowClosing(WindowEvent we) {
    System.out.println("Window closing");
System.exit(0);
}
});

f.setLayout(null);
f.setSize(600, 600);
f.setBackground(Color.green);

f.setVisible(true);

}



public void paint(Graphics g)
{
        Font fo = new Font("candela", Font.BOLD, 35);
        g.setFont(fo);

}

 public void actionPerformed(ActionEvent e) {

int a = Integer.parseInt(t1.getText());
int b = Integer.parseInt(t2.getText());
if (e.getSource().equals(b1)) {
    int temp;
    temp=a;
    a=b;
    b=temp;
  
t1.setText(String.valueOf( + a));
t2.setText(String.valueOf( + b));
}
}
public static void main(String args[]) {
Swap f = new Swap();
}
}





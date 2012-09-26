import java.awt.*;
import java.awt.event.*;

public class Ventana extends Frame implements WindowListener,ActionListener {
        TextField text = new TextField(20);
        Button b,b2,b3,b4,b5,b6,b7;
        private int numClicks = 0;
        String cadena="";

        public static void main(String[] args) {
        	Ventana myWindow = new Ventana("My first window");
                myWindow.setSize(350,100);
                myWindow.setVisible(true);
        }

        public Ventana(String title) {

                super(title);
                setLayout(new FlowLayout());
                addWindowListener(this);
                
                b = new Button("A");
                add(b);
                b2 = new Button("E");
                add(b2);
                b3 = new Button("I");
                add(b3);
                b4 = new Button("O");
                add(b4);
                b5 = new Button("U");
                add(b5);
                
                b7 = new Button("ESPACIO");
                add(b7);
                
                b6 = new Button("BORRAR");
                add(b6);
                
                add(text);
                
                b.addActionListener(this);
                b.setActionCommand("a");
                
                b2.addActionListener(this);
                b2.setActionCommand("e");
                
                b3.addActionListener(this);
                b3.setActionCommand("i");
                
                b4.addActionListener(this);
                b4.setActionCommand("o");
                
                b5.addActionListener(this);
                b5.setActionCommand("u");
                
                b7.addActionListener(this);
                b7.setActionCommand("espacio");
                
                b6.addActionListener(this);
                b6.setActionCommand("borrar");
        }

        public void actionPerformed(ActionEvent e) {
        		//text.setText("Button Clicked " + numClicks + " times");
        	if ("a".equals(e.getActionCommand())){
        		
        		cadena=cadena+"A";
        		System.out.println(cadena);
        		text.setText(cadena);
        	}
        	if ("e".equals(e.getActionCommand())){
        		
        		cadena=cadena+"E";
        		System.out.println(cadena);
        		text.setText(cadena);
        	}
        	if ("i".equals(e.getActionCommand())){
        		
        		cadena=cadena+"I";
        		System.out.println(cadena);
        		text.setText(cadena);
        	}
        	if ("o".equals(e.getActionCommand())){
        		
        		cadena=cadena+"O";
        		System.out.println(cadena);
        		text.setText(cadena);
        	}
        	if ("u".equals(e.getActionCommand())){
        		
        		cadena=cadena+"U";
        		System.out.println(cadena);
        		text.setText(cadena);
        	}
        	
        	if ("espacio".equals(e.getActionCommand())){
        		
        		cadena=cadena+" ";
        		System.out.println(cadena);
        		text.setText(cadena);
        	}
        	
        	if ("borrar".equals(e.getActionCommand())){
        		
        		cadena="";
        		System.out.println(cadena);
        		text.setText(cadena);
        	}
        	
        }

        public void windowClosing(WindowEvent e) {
                dispose();
                System.exit(0);
        }

        public void windowOpened(WindowEvent e) {}
        public void windowActivated(WindowEvent e) {}
        public void windowIconified(WindowEvent e) {}
        public void windowDeiconified(WindowEvent e) {}
        public void windowDeactivated(WindowEvent e) {}
        public void windowClosed(WindowEvent e) {}

}
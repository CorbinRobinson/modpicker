import java.io.*;

public class fileReader {
    public static void main(String[] args) {
        File file = new File("modpackInfo\\bleh.txt");
        String newFile = "Mineshafts&Monsters.txt";
        try {
            BufferedReader br = new BufferedReader(new FileReader(file));
            createFile(newFile);
            FileWriter writer = new FileWriter("modpackInfo\\" + newFile);
            String s;
            int i = 0;
            while ((s = br.readLine()) != null) {
                if (i % 4 == 0) {
                    writer.write(s + "\n");
                    System.out.println(s);
                }
                i++;
            }
            br.close();
            writer.close();
        } catch (Exception e) {
            System.out.println(e);
        }

    }

    public static void createFile(String fileName) {
        try {
            File myObj = new File("modpackInfo\\" + fileName);
            if (myObj.createNewFile()) {
                System.out.println("File created: " + myObj.getName());
            } else {
                System.out.println("File already exists.");
            }
        } catch (IOException e) {
            System.out.println("An error occurred.");
            e.printStackTrace();
        }
    }
}

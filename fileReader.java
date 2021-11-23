import java.io.*;
import java.util.ArrayList;

public class fileReader {
    public static void main(String[] args) {
        // createModlist();

        try {
            createOverallModlist();
        } catch (IOException e) {
            // TODO Auto-generated catch block
            System.out.println(e);
        }

    }

    public static void createOverallModlist() throws IOException {
        File dir = new File("modpackInfo");
        File[] directoryListing = dir.listFiles();
        ArrayList<String> modlist = new ArrayList<String>();
        int overlapCount = 0;
        if (directoryListing != null) {
            FileWriter writer = new FileWriter("src\\modpackInfo\\all.txt");
            for (File child : directoryListing) {
                // Do something with child
                try {
                    BufferedReader br = new BufferedReader(new FileReader(child));
                    String s;
                    // int i = 0;
                    while ((s = br.readLine()) != null) {
                        if (!modlist.contains(s)) {
                            // writer.write(s + "\n");
                            modlist.add(s);
                            // System.out.println(s);
                        } else {
                            overlapCount++;
                        }
                        // i++;
                    }
                    br.close();
                } catch (Exception e) {
                    System.out.println(e);
                }
            }
            writer.close();
        } else {
            System.out.println("could not find dir");
        }
        System.out.println(overlapCount);
    }

    public static void createModlist() {
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

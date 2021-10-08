// WITH PARAMETER
JdbcProperties.connectDb();
Connection c = JdbcProperties.conn;
try {
    String reportName = "Report/r_detail_payroll.jasper";
    String imgPath = "Report/PST02.jpg";
    InputStream fis = this.getClass().getClassLoader().getResourceAsStream(reportName);
    InputStream is = this.getClass().getClassLoader().getResourceAsStream(imgPath);
    Map params = new HashMap();
    params.put("start", dateFormat.format(start.getDate()));
    params.put("end", dateFormat.format(end.getDate()));
    params.put("img", is);
    JasperReport jasperReport = (JasperReport) JRLoader.loadObject(fis);
    JasperPrint jasperPrint = JasperFillManager.fillReport(jasperReport, params, c);
    JasperViewer.viewReport(jasperPrint, false);
    } catch (Exception ex) {
    Logger.getLogger(AbsensiBulananInput.class.getName()).log(Level.SEVERE, null, ex);
    JOptionPane.showMessageDialog(null, new Object[]{
        "Error : " + ex
    });
}

//WITHOUT PARAMETER
try {
    //DBConnection conn = DBConnection.getInstance();
    open_db();
    FileInputStream fis = new FileInputStream("src/sispen/report/lapbarang.jrxml");
    BufferedInputStream bufferedInputStream = new BufferedInputStream(fis);
    
    //set parameters
    Map map = new HashMap();
    
    //compile report
    JasperReport jasperReport = (JasperReport) JasperCompileManager.compileReport(bufferedInputStream);
    JasperPrint jasperPrint = JasperFillManager.fillReport(jasperReport, map, Con);
    
    //view report to UI
    JasperViewer jasperViewer = new JasperViewer(jasperPrint,false);
    jasperViewer.setTitle("Laporan Data Barang");
    
    JasperViewer.viewReport(jasperPrint, false);
    
    } catch (Exception ex) {
    ex.printStackTrace();
}

/*

Library yang dibutuhkan:

1.jasperreport-versinya.jar 
2.commons-beanutils-versinya.jar
3.commons-collections-versinya.jar
4.commons-digester-versinya.jar
5.commons-javaflow-versinya.jar
6.commons-logging-versinya.jar dan
7.iText-versinya.jar
8.jdt-compiler-versinya.jar
9. groovy-all-1.7.5.jar

*/

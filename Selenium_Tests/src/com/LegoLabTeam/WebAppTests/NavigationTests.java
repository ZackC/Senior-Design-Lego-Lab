package com.LegoLabTeam.WebAppTests;

import junit.framework.TestCase;
import java.util.regex.Pattern;
import java.util.concurrent.TimeUnit;
import org.junit.*;
import static org.junit.Assert.*;
import static org.hamcrest.CoreMatchers.*;
import org.openqa.selenium.*;
import org.openqa.selenium.firefox.FirefoxDriver;
import org.openqa.selenium.support.ui.Select;

/***
 * These are tests for testing the navigation of the GUI
 * 
 * @author Zack Coker
 *
 */
public class NavigationTests extends TestCase
{
	  private WebDriver driver;
	  private String baseUrl;
	  private boolean acceptNextAlert = true;
	  private StringBuffer verificationErrors = new StringBuffer();

	  @Before
	  public void setUp() throws Exception {
	    driver = new FirefoxDriver();
	    baseUrl = "http://127.0.0.1/GUIPages/LegoLabCellGui/";
	    driver.manage().timeouts().implicitlyWait(30, TimeUnit.SECONDS);
	  }

	  @Test
	  public void testNavigationToCellOverviewPage() throws Exception
	  {
		  LabDisplayPageObject.navigateToSelf(driver, baseUrl);
	  }
	  
	 @Test
	  public void testNavigationToCell1() throws Exception {
	    
		LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
	    cellOverview.navigateToCell1();
	  }
	 
	 @Test
	  public void testNavigationToCell1AndBack() throws Exception {
	    
		LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
	    cellOverview.navigateToCell1().goBack();
	  }
	 
	 @Test
	  public void testNavigationToCell2() throws Exception {
	    
		LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
	    cellOverview.navigateToCell2();
	  }
	 
	 @Test
	  public void testNavigationToCell2AndBack() throws Exception {
	    
		LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
	    cellOverview.navigateToCell2().goBack();
	  }
	 
	 @Test
	  public void testNavigationToCell3() throws Exception {
	    
		LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
	    cellOverview.navigateToCell3();
	  }
	 
	 @Test
	  public void testNavigationToCell3AndBack() throws Exception {
	    
		LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
	    cellOverview.navigateToCell3().goBack();
	  }
	 
	 @Test
	 public void testNavigationToCell1Overall() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 cellOverview.navigateToCell1().navigateToOverall();
	 }
	 
	 @Test
	 public void testNavigationToCell1OverallAndBack() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 cellOverview.navigateToCell1().navigateToOverall().goBack();
	 }
	 
	 @Test
	 public void testNavigationToCell1Station1() throws Exception
	 {
		LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		cellOverview.navigateToCell1().navigateToStation1();
	 }
	 
	 @Test
	 public void testNavigationToCell1Station1AndBack() throws Exception
	 {
		LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		cellOverview.navigateToCell1().navigateToStation1().goBack();
	 }
	 
	 @Test
	 public void testNavigationToCell1Station2() throws Exception
	 {
		LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		cellOverview.navigateToCell1().navigateToStation2();
	 }
	 
	 @Test
	 public void testNavigationToCell1Station2AndBack() throws Exception
	 {
		LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		cellOverview.navigateToCell1().navigateToStation2().goBack();
	 }
	 
	 @Test
	 public void testNavigationToCell1Station3() throws Exception
	 {
		LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		cellOverview.navigateToCell1().navigateToStation3();
	 }
	 
	 @Test
	 public void testNavigationToCell1Station3AndBack() throws Exception
	 {
		LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		cellOverview.navigateToCell1().navigateToStation3().goBack();
	 }
	 
	 @Test
	 public void testNavigationToCell1Station4() throws Exception
	 {
		LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		cellOverview.navigateToCell1().navigateToStation4();
	 }
	 
	 @Test
	 public void testNavigationToCell1Station4AndBack() throws Exception
	 {
		LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		cellOverview.navigateToCell1().navigateToStation4().goBack();
	 }
	 
	 @Test
	 public void testNavigationToCell1Station5() throws Exception
	 {
		LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		cellOverview.navigateToCell1().navigateToStation5();
	 }
	 
	 @Test
	 public void testNavigationToCell1Station5AndBack() throws Exception
	 {
		LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		cellOverview.navigateToCell1().navigateToStation5().goBack();
	 }
	 
	 @Test
	 public void testNavigationToCell2Overall() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 cellOverview.navigateToCell2().navigateToOverall();
	 }
	 
	 @Test
	 public void testNavigationToCell2OverallAndBack() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 cellOverview.navigateToCell2().navigateToOverall().goBack();
	 }
	 
	 @Test
	 public void testNavigationToCell2Station1() throws Exception
	 {
		LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		cellOverview.navigateToCell2().navigateToStation1();
	 }
	 
	 @Test
	 public void testNavigationToCell2Station1AndBack() throws Exception
	 {
		LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		cellOverview.navigateToCell2().navigateToStation1().goBack();
	 }
	 
	 @Test
	 public void testNavigationToCell2Station2() throws Exception
	 {
		LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		cellOverview.navigateToCell2().navigateToStation2();
	 }
	 
	 @Test
	 public void testNavigationToCell2Station2AndBack() throws Exception
	 {
		LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		cellOverview.navigateToCell2().navigateToStation2().goBack();
	 }
	 
	 @Test
	 public void testNavigationToCell2Station3() throws Exception
	 {
		LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		cellOverview.navigateToCell2().navigateToStation3();
	 }
	 
	 @Test
	 public void testNavigationToCell2Station3AndBack() throws Exception
	 {
		LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		cellOverview.navigateToCell2().navigateToStation3().goBack();
	 }
	 
	 @Test
	 public void testNavigationToCell2Station4() throws Exception
	 {
		LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		cellOverview.navigateToCell2().navigateToStation4();
	 }
	 
	 @Test
	 public void testNavigationToCell2Station4AndBack() throws Exception
	 {
		LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		cellOverview.navigateToCell2().navigateToStation4().goBack();
	 }
	 
	 @Test
	 public void testNavigationToCell2Station5() throws Exception
	 {
		LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		cellOverview.navigateToCell2().navigateToStation5();
	 }
	 
	 @Test
	 public void testNavigationToCell2Station5AndBack() throws Exception
	 {
		LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		cellOverview.navigateToCell2().navigateToStation5().goBack();
	 }
	 
	 @Test
	 public void testNavigationToCell3Overall() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 cellOverview.navigateToCell3().navigateToOverall();
	 }
	 
	 @Test
	 public void testNavigationToCell3OverallAndBack() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 cellOverview.navigateToCell3().navigateToOverall().goBack();
	 }
	 
	 @Test
	 public void testNavigationToCell3Station1() throws Exception
	 {
		LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		cellOverview.navigateToCell3().navigateToStation1();
	 }
	 
	 @Test
	 public void testNavigationToCell3Station1AndBack() throws Exception
	 {
		LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		cellOverview.navigateToCell3().navigateToStation1().goBack();
	 }
	 
	 @Test
	 public void testNavigationToCell3Station2() throws Exception
	 {
		LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		cellOverview.navigateToCell3().navigateToStation2();
	 }
	 
	 @Test
	 public void testNavigationToCell3Station2AndBack() throws Exception
	 {
		LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		cellOverview.navigateToCell3().navigateToStation2().goBack();
	 }
	 
	 @Test
	 public void testNavigationToCell3Station3() throws Exception
	 {
		LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		cellOverview.navigateToCell3().navigateToStation3();
	 }
	 
	 @Test
	 public void testNavigationToCell3Station3AndBack() throws Exception
	 {
		LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		cellOverview.navigateToCell3().navigateToStation3().goBack();
	 }
	 
	 @Test
	 public void testNavigationToCell3Station4() throws Exception
	 {
		LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		cellOverview.navigateToCell3().navigateToStation4();
	 }
	 
	 @Test
	 public void testNavigationToCell3Station4AndBack() throws Exception
	 {
		LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		cellOverview.navigateToCell3().navigateToStation4().goBack();
	 }
	 
	 @Test
	 public void testNavigationToCell3Station5() throws Exception
	 {
		LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		cellOverview.navigateToCell3().navigateToStation5();
	 }
	 
	 @Test
	 public void testNavigationToCell3Station5AndBack() throws Exception
	 {
		LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		cellOverview.navigateToCell3().navigateToStation5().goBack();
	 }
     
	  @After
	  public void tearDown() throws Exception {
	    driver.quit();
	    String verificationErrorString = verificationErrors.toString();
	    if (!"".equals(verificationErrorString)) {
	      fail(verificationErrorString);
	    }
	  }

	  private boolean isElementPresent(By by) {
	    try {
	      driver.findElement(by);
	      return true;
	    } catch (NoSuchElementException e) {
	      return false;
	    }
	  }

	  private String closeAlertAndGetItsText() {
	    try {
	      Alert alert = driver.switchTo().alert();
	      if (acceptNextAlert) {
	        alert.accept();
	      } else {
	        alert.dismiss();
	      }
	      return alert.getText();
	    } finally {
	      acceptNextAlert = true;
	    }
	  }
	
}

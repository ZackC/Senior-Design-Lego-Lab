package com.LegoLabTeam.WebAppTests;

import java.util.concurrent.TimeUnit;

import junit.framework.TestCase;

import org.junit.After;
import org.junit.Before;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.firefox.FirefoxDriver;
import org.junit.*;
import static org.junit.Assert.*;
import static org.hamcrest.CoreMatchers.*;
/***
 * This class holds the tests for the static information of the GUI
 * 
 */
public class StationStaticDisplayTests extends TestCase{

	WebDriver driver;
	String baseUrl;
	private StringBuffer verificationErrors = new StringBuffer();
	
	/***
	 * The set up for the test cases.  
	 */
	 @Before
	  public void setUp() throws Exception {
	    driver = new FirefoxDriver();
	    baseUrl = "http://127.0.0.1/GUIPages/LegoLabCellGui/";
	    driver.manage().timeouts().implicitlyWait(30, TimeUnit.SECONDS);
	  }
	 

	 @Test
	 public void testProccessStringAtCell1OverallStation() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell1().navigateToOverall().checkProcessText();
	 }
	 
	 @Test
	 public void testDailyDefectStringAtCell1OverallStation() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell1().navigateToOverall().checkDailyDefectText();
	 }
	 
	 @Test
	 public void testIdleTimeStringAtCell1OverallStation() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell1().navigateToOverall().checkIdleTimeText();
	 }
	 
	 @Test
	 public void testTimeSinceStringAtCell1OverallStation() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell1().navigateToOverall().checkTimeSinceDefectText();
	 }
	 
	 @Test
	 public void testLeadTimeStringAtCell1OverallStation() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell1().navigateToOverall().checkLeadTimeText();
	 }
	 
	 @Test
	 public void testProcessTimesGraphAtCell1OverallStation() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell1().navigateToOverall().checkProcessTimesImage();
	 }
	 
	 @Test
	 public void testIdleTimesGraphAtCell1OverallStation() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell1().navigateToOverall().checkIdleTimesImage();
	 }
	 
	 //========================================================================
	 @Test
	 public void testProccessStringAtCell1Station1() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell1().navigateToStation1().checkProcessText();
	 }
	 
	 @Test
	 public void testDailyDefectStringAtCell1Station1() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell1().navigateToStation1().checkDailyDefectText();
	 }
	 
	 @Test
	 public void testIdleTimeStringAtCell1Station1() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell1().navigateToStation1().checkIdleTimeText();
	 }
	 
	 @Test
	 public void testTimeSinceStringAtCell1Station1() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell1().navigateToStation1().checkTimeSinceDefectText();
	 }
	 
	 @Test
	 public void testCycleTimeStringAtCell1Station1() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell1().navigateToStation1().checkCycleTimeText();
	 }
	 @Test
	 public void testProcessTimesGraphAtCell1Station1() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell1().navigateToStation1().checkProcessTimesImage();
	 }
	 
	 @Test
	 public void testIdleTimesGraphAtCell1Station1() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell1().navigateToStation1().checkIdleTimesImage();
	 }
	 //=================================================================
	 @Test
	 public void testProccessStringAtCell1Station2() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell1().navigateToStation2().checkProcessText();
	 }
	 
	 @Test
	 public void testDailyDefectStringAtCell1Station2() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell1().navigateToStation2().checkDailyDefectText();
	 }
	 
	 @Test
	 public void testIdleTimeStringAtCell1Station2() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell1().navigateToStation2().checkIdleTimeText();
	 }
	 
	 @Test
	 public void testTimeSinceStringAtCell1Station2() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell1().navigateToStation2().checkTimeSinceDefectText();
	 }
	 
	 @Test
	 public void testCycleTimeStringAtCell1Station2() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell1().navigateToStation2().checkCycleTimeText();
	 }
	 @Test
	 public void testProcessTimesGraphAtCell1Station2() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell1().navigateToStation2().checkProcessTimesImage();
	 }
	 
	 @Test
	 public void testIdleTimesGraphAtCell1Station2() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell1().navigateToStation2().checkIdleTimesImage();
	 }
	 //==========================================================================
	 @Test
	 public void testProccessStringAtCell1Station3() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell1().navigateToStation3().checkProcessText();
	 }
	 
	 @Test
	 public void testDailyDefectStringAtCell1Station3() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell1().navigateToStation3().checkDailyDefectText();
	 }
	 
	 @Test
	 public void testIdleTimeStringAtCell1Station3() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell1().navigateToStation3().checkIdleTimeText();
	 }
	 
	 @Test
	 public void testTimeSinceStringAtCell1Station3() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell1().navigateToStation3().checkTimeSinceDefectText();
	 }
	 
	 @Test
	 public void testCycleTimeStringAtCell1Station3() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell1().navigateToStation3().checkCycleTimeText();
	 }
	 @Test
	 public void testProcessTimesGraphAtCell1Station3() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell1().navigateToStation3().checkProcessTimesImage();
	 }
	 
	 @Test
	 public void testIdleTimesGraphAtCell1Station3() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell1().navigateToStation3().checkIdleTimesImage();
	 }
	 //================================================================================
	 @Test
	 public void testProccessStringAtCell1Station4() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell1().navigateToStation4().checkProcessText();
	 }
	 
	 @Test
	 public void testDailyDefectStringAtCell1Station4() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell1().navigateToStation4().checkDailyDefectText();
	 }
	 
	 @Test
	 public void testIdleTimeStringAtCell1Station4() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell1().navigateToStation4().checkIdleTimeText();
	 }
	 
	 @Test
	 public void testTimeSinceStringAtCell1Station4() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell1().navigateToStation4().checkTimeSinceDefectText();
	 }
	 
	 @Test
	 public void testCycleTimeStringAtCell1Station4() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell1().navigateToStation4().checkCycleTimeText();
	 }
	 @Test
	 public void testProcessTimesGraphAtCell1Station4() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell1().navigateToStation4().checkProcessTimesImage();
	 }
	 
	 @Test
	 public void testIdleTimesGraphAtCell1Station4() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell1().navigateToStation4().checkIdleTimesImage();
	 }
	 //=======================================================================
	 @Test
	 public void testProccessStringAtCell1Station5() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell1().navigateToStation5().checkProcessText();
	 }
	 
	 @Test
	 public void testDailyDefectStringAtCell1Station5() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell1().navigateToStation5().checkDailyDefectText();
	 }
	 
	 @Test
	 public void testIdleTimeStringAtCell1Station5() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell1().navigateToStation5().checkIdleTimeText();
	 }
	 
	 @Test
	 public void testTimeSinceStringAtCell1Station5() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell1().navigateToStation5().checkTimeSinceDefectText();
	 }
	 
	 @Test
	 public void testCycleTimeStringAtCell1Station5() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell1().navigateToStation5().checkCycleTimeText();
	 }
	 @Test
	 public void testProcessTimesGraphAtCell1Station5() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell1().navigateToStation5().checkProcessTimesImage();
	 }
	 
	 @Test
	 public void testIdleTimesGraphAtCell1Station5() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell1().navigateToStation5().checkIdleTimesImage();
	 }
	 //=========================================================================
	 @Test
	 public void testProccessStringAtCell2OverallStation1() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell2().navigateToOverall().checkProcessText();
	 }
	 
	 @Test
	 public void testDailyDefectStringAtCell2OverallStation1() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell2().navigateToOverall().checkDailyDefectText();
	 }
	 
	 @Test
	 public void testIdleTimeStringAtCell2OverallStation() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell2().navigateToOverall().checkIdleTimeText();
	 }
	 
	 @Test
	 public void testTimeSinceStringAtCell2OverallStation() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell2().navigateToOverall().checkTimeSinceDefectText();
	 }
	 
	 @Test
	 public void testLeadTimeStringAtCell2OverallStation() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell2().navigateToOverall().checkLeadTimeText();
	 }
	 @Test
	 public void testProcessTimesGraphAtCell2OverallStation() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell2().navigateToOverall().checkProcessTimesImage();
	 }
	 
	 @Test
	 public void testIdleTimesGraphAtCell2OverallStation() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell2().navigateToOverall().checkIdleTimesImage();
	 }
	 //=========================================================================
	 @Test
	 public void testProccessStringAtCell2Station1() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell2().navigateToStation1().checkProcessText();
	 }
	 
	 @Test
	 public void testDailyDefectStringAtCell2Station1() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell2().navigateToStation1().checkDailyDefectText();
	 }
	 
	 @Test
	 public void testIdleTimeStringAtCell2Station1() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell2().navigateToStation1().checkIdleTimeText();
	 }
	 
	 @Test
	 public void testTimeSinceStringAtCell2Station1() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell2().navigateToStation1().checkTimeSinceDefectText();
	 }
	 
	 @Test
	 public void testCycleTimeStringAtCell2Station1() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell2().navigateToStation1().checkCycleTimeText();
	 }
	 @Test
	 public void testProcessTimesGraphAtCell2Station1() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell2().navigateToStation1().checkProcessTimesImage();
	 }
	 
	 @Test
	 public void testIdleTimesGraphAtCell2Station1() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell2().navigateToStation1().checkIdleTimesImage();
	 }
	 //====================================================================
	 @Test
	 public void testProccessStringAtCell2Station2() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell2().navigateToStation2().checkProcessText();
	 }
	 
	 @Test
	 public void testDailyDefectStringAtCell2Station2() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell2().navigateToStation2().checkDailyDefectText();
	 }
	 
	 @Test
	 public void testIdleTimeStringAtCell2Station2() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell2().navigateToStation2().checkIdleTimeText();
	 }
	 
	 @Test
	 public void testTimeSinceStringAtCell2Station2() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell2().navigateToStation2().checkTimeSinceDefectText();
	 }
	 
	 @Test
	 public void testCycleTimeStringAtCell2Station2() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell2().navigateToStation2().checkCycleTimeText();
	 }
	 @Test
	 public void testProcessTimesGraphAtCell2Station2() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell2().navigateToStation2().checkProcessTimesImage();
	 }
	 
	 @Test
	 public void testIdleTimesGraphAtCell2Station2() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell2().navigateToStation2().checkIdleTimesImage();
	 }
	 //==================================================================================
	 @Test
	 public void testProccessStringAtCell2Station3() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell2().navigateToStation3().checkProcessText();
	 }
	 
	 @Test
	 public void testDailyDefectStringAtCell2Station3() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell2().navigateToStation3().checkDailyDefectText();
	 }
	 
	 @Test
	 public void testIdleTimeStringAtCell2Station3() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell2().navigateToStation3().checkIdleTimeText();
	 }
	 
	 @Test
	 public void testTimeSinceStringAtCell2Station3() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell2().navigateToStation3().checkTimeSinceDefectText();
	 }
	 
	 @Test
	 public void testCycleTimeStringAtCell2Station3() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell2().navigateToStation3().checkCycleTimeText();
	 }
	 @Test
	 public void testProcessTimesGraphAtCell2Station3() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell2().navigateToStation3().checkProcessTimesImage();
	 }
	 
	 @Test
	 public void testIdleTimesGraphAtCell2Station3() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell2().navigateToStation3().checkIdleTimesImage();
	 }
	 //======================================================================================
	 @Test
	 public void testProccessStringAtCell2Station4() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell2().navigateToStation4().checkProcessText();
	 }
	 
	 @Test
	 public void testDailyDefectStringAtCell2Station4() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell2().navigateToStation4().checkDailyDefectText();
	 }
	 
	 @Test
	 public void testIdleTimeStringAtCell2Station4() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell2().navigateToStation4().checkIdleTimeText();
	 }
	 
	 @Test
	 public void testTimeSinceStringAtCell2Station4() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell2().navigateToStation4().checkTimeSinceDefectText();
	 }
	 
	 @Test
	 public void testCycleTimeStringAtCell2Station4() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell2().navigateToStation4().checkCycleTimeText();
	 }
	 @Test
	 public void testProcessTimesGraphAtCell2Station4() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell2().navigateToStation4().checkProcessTimesImage();
	 }
	 
	 @Test
	 public void testIdleTimesGraphAtCell2Station4() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell2().navigateToStation4().checkIdleTimesImage();
	 }
	 //================================================================================
	 @Test
	 public void testProccessStringAtCell2Station5() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell2().navigateToStation5().checkProcessText();
	 }
	 
	 @Test
	 public void testDailyDefectStringAtCell2Station5() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell2().navigateToStation5().checkDailyDefectText();
	 }
	 
	 @Test
	 public void testIdleTimeStringAtCell2Station5() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell2().navigateToStation5().checkIdleTimeText();
	 }
	 
	 @Test
	 public void testTimeSinceStringAtCell2Station5() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell2().navigateToStation5().checkTimeSinceDefectText();
	 }
	 
	 @Test
	 public void testCycleTimeStringAtCell2Station5() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell2().navigateToStation5().checkCycleTimeText();
	 }
	 @Test
	 public void testProcessTimesGraphAtCell2Station5() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell2().navigateToStation5().checkProcessTimesImage();
	 }
	 
	 @Test
	 public void testIdleTimesGraphAtCell2Station5() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell2().navigateToStation5().checkIdleTimesImage();
	 }
	 
	 //=======================================================================
	 @Test
	 public void testProccessStringAtCell3OverallStation() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell3().navigateToOverall().checkProcessText();
	 }
	 
	 @Test
	 public void testDailyDefectStringAtCell3OverallStation() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell3().navigateToOverall().checkDailyDefectText();
	 }
	 
	 @Test
	 public void testIdleTimeStringAtCell3OverallStation() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell3().navigateToOverall().checkIdleTimeText();
	 }
	 
	 @Test
	 public void testTimeSinceStringAtCell3OverallStation() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell3().navigateToOverall().checkTimeSinceDefectText();
	 }
	 
	 @Test
	 public void testLeadTimeStringAtCell3OverallStation() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell3().navigateToOverall().checkLeadTimeText();
	 }
	 @Test
	 public void testProcessTimesGraphAtCell3OverallStation() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell3().navigateToOverall().checkProcessTimesImage();
	 }
	 
	 @Test
	 public void testIdleTimesGraphAtCell3OverallStation() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell3().navigateToOverall().checkIdleTimesImage();
	 }
	 //=======================================================================
	 @Test
	 public void testProccessStringAtCell3Station1() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell3().navigateToStation1().checkProcessText();
	 }
	 
	 @Test
	 public void testDailyDefectStringAtCell3Station1() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell3().navigateToStation1().checkDailyDefectText();
	 }
	 
	 @Test
	 public void testIdleTimeStringAtCell3Station1() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell3().navigateToStation1().checkIdleTimeText();
	 }
	 
	 @Test
	 public void testTimeSinceStringAtCell3Station1() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell3().navigateToStation1().checkTimeSinceDefectText();
	 }
	 
	 @Test
	 public void testCycleTimeStringAtCell3Station1() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell3().navigateToStation1().checkCycleTimeText();
	 }
	 @Test
	 public void testProcessTimesGraphAtCell3Station1() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell3().navigateToStation1().checkProcessTimesImage();
	 }
	 
	 @Test
	 public void testIdleTimesGraphAtCell3Station1() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell3().navigateToStation1().checkIdleTimesImage();
	 }
	 //========================================================================
	 @Test
	 public void testProccessStringAtCell3Station2() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell3().navigateToStation2().checkProcessText();
	 }
	 
	 @Test
	 public void testDailyDefectStringAtCell3Station2() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell3().navigateToStation2().checkDailyDefectText();
	 }
	 
	 @Test
	 public void testIdleTimeStringAtCell3Station2() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell3().navigateToStation2().checkIdleTimeText();
	 }
	 
	 @Test
	 public void testTimeSinceStringAtCell3Station2() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell3().navigateToStation2().checkTimeSinceDefectText();
	 }
	 
	 @Test
	 public void testCycleTimeStringAtCell3Station2() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell3().navigateToStation2().checkCycleTimeText();
	 }
	 @Test
	 public void testProcessTimesGraphAtCell3Station2() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell3().navigateToStation2().checkProcessTimesImage();
	 }
	 
	 @Test
	 public void testIdleTimesGraphAtCell3Station2() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell3().navigateToStation2().checkIdleTimesImage();
	 }
	 //=====================================================================
	 @Test
	 public void testProccessStringAtCell3Station3() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell3().navigateToStation3().checkProcessText();
	 }
	 
	 @Test
	 public void testDailyDefectStringAtCell3Station3() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell3().navigateToStation3().checkDailyDefectText();
	 }
	 
	 @Test
	 public void testIdleTimeStringAtCell3Station3() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell3().navigateToStation3().checkIdleTimeText();
	 }
	 
	 @Test
	 public void testTimeSinceStringAtCell3Station3() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell3().navigateToStation3().checkTimeSinceDefectText();
	 }
	 
	 @Test
	 public void testCycleTimeStringAtCell3Station3() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell3().navigateToStation3().checkCycleTimeText();
	 }
	 @Test
	 public void testProcessTimesGraphAtCell3Station3() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell3().navigateToStation3().checkProcessTimesImage();
	 }
	 
	 @Test
	 public void testIdleTimesGraphAtCell3Station3() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell3().navigateToStation3().checkIdleTimesImage();
	 }
	 //==============================================================================
	 @Test
	 public void testProccessStringAtCell3Station4() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell3().navigateToStation4().checkProcessText();
	 }
	 
	 @Test
	 public void testDailyDefectStringAtCell3Station4() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell3().navigateToStation4().checkDailyDefectText();
	 }
	 
	 @Test
	 public void testIdleTimeStringAtCell3Station4() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell3().navigateToStation4().checkIdleTimeText();
	 }
	 
	 @Test
	 public void testTimeSinceStringAtCell3Station4() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell3().navigateToStation4().checkTimeSinceDefectText();
	 }
	 
	 @Test
	 public void testCycleTimeStringAtCell3Station4() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell3().navigateToStation4().checkCycleTimeText();
	 }
	 @Test
	 public void testProcessTimesGraphAtCell3Station4() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell3().navigateToStation4().checkProcessTimesImage();
	 }
	 
	 @Test
	 public void testIdleTimesGraphAtCell3Station4() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell3().navigateToStation4().checkIdleTimesImage();
	 }
	 //==========================================================================
	 @Test
	 public void testProccessStringAtCell3Station5() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell3().navigateToStation5().checkProcessText();
	 }
	 
	 @Test
	 public void testDailyDefectStringAtCell3Station5() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell3().navigateToStation5().checkDailyDefectText();
	 }
	 
	 @Test
	 public void testIdleTimeStringAtCell3Station5() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell3().navigateToStation5().checkIdleTimeText();
	 }
	 
	 @Test
	 public void testTimeSinceStringAtCell3Station5() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell3().navigateToStation5().checkTimeSinceDefectText();
	 }
	 
	 @Test
	 public void testCycleTimeStringAtCell3Station5() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell3().navigateToStation5().checkCycleTimeText();
	 }
	 @Test
	 public void testProcessTimesGraphAtCell3Station5() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell3().navigateToStation5().checkProcessTimesImage();
	 }
	 
	 @Test
	 public void testIdleTimesGraphAtCell3Station5() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		    cellOverview.navigateToCell3().navigateToStation5().checkIdleTimesImage();
	 }
	 
	 @After
	  public void tearDown() throws Exception {
	    driver.quit();
	    String verificationErrorString = verificationErrors.toString();
	    if (!"".equals(verificationErrorString)) {
	      fail(verificationErrorString);
	    }
	  }
}

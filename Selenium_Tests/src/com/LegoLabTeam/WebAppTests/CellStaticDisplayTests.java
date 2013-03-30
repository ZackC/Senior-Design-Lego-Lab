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

public class CellStaticDisplayTests extends TestCase {
	WebDriver driver;
	String baseUrl;
	private StringBuffer verificationErrors = new StringBuffer();
	
	 @Before
	  public void setUp() throws Exception {
	    driver = new FirefoxDriver();
	    baseUrl = "http://127.0.0.1/GUI%20Pages/LegoLabCellGui/";
	    driver.manage().timeouts().implicitlyWait(30, TimeUnit.SECONDS);
	  }
	 
	 @Test
	 public void testCell1OverallButtonContainsTitle() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkTextIsInButton(cellOverview.navigateToCell1().getOverallButton(driver),
				 "Overall");
	 }
	 
	 @Test
	 public void testCell1OverallButtonContainsProcessTimeText() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkTextIsInButton(cellOverview.navigateToCell1().getOverallButton(driver),
				 "Average Process Time");
	 }
	 
	 @Test
	 public void testCell1OverallButtonContainsIdleTimeText() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkTextIsInButton(cellOverview.navigateToCell1().getOverallButton(driver),
				 "Average Idle Time");
	 }
	 
	 @Test
	 public void testCell1OverallButtonContainsTaktTimeText() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkTextIsInButton(cellOverview.navigateToCell1().getOverallButton(driver),
				 "Takt Time");
	 }
	 
	 @Test
	 public void testCell1OverallButtonContainsDefectText() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkTextIsInButton(cellOverview.navigateToCell1().getOverallButton(driver),
				 "Daily Defects");
	 }
	 
	 @Test
	 public void testCell1OverallButtonContainsBottleneckText() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkTextIsInButton(cellOverview.navigateToCell1().getOverallButton(driver),
				 "Bottleneck Station");
	 }
	 
	 @Test
	 public void testCell1OverallButtonContainsStatus() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkStatusIsInButton(cellOverview.navigateToCell1().getOverallButton(driver),
				 0);
	 }
	 //====================================================================================
	 @Test
	 public void testCell1Station1ButtonContainsTitle() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkTextIsInButton(cellOverview.navigateToCell1().getStation1Button(driver),
				 "Station 1");
	 }
	 
	 @Test
	 public void testCell1Station1ButtonContainsProcessTimeText() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkTextIsInButton(cellOverview.navigateToCell1().getStation1Button(driver),
				 "Average Process Time");
	 }
	 
	 @Test
	 public void testCell1Station1ButtonContainsIdleTimeText() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkTextIsInButton(cellOverview.navigateToCell1().getStation1Button(driver),
				 "Average Idle Time");
	 }
	 
	 @Test
	 public void testCell1Station1ButtonContainsTaktTimeText() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkTextIsInButton(cellOverview.navigateToCell1().getStation1Button(driver),
				 "Takt Time");
	 }
	 
	 @Test
	 public void testCell1Station1ButtonContainsDefectText() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkTextIsInButton(cellOverview.navigateToCell1().getStation1Button(driver),
				 "Daily Defects");
	 }
	 
	 
	 @Test
	 public void testCell1Station1ButtonContainsStatus() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkStatusIsInButton(cellOverview.navigateToCell1().getStation1Button(driver),
				 1);
	 }
	 //==================================================================================
	 @Test
	 public void testCell1Station2ButtonContainsTitle() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkTextIsInButton(cellOverview.navigateToCell1().getStation2Button(driver),
				 "Station 2");
	 }
	 
	 @Test
	 public void testCell1Station2ButtonContainsProcessTimeText() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkTextIsInButton(cellOverview.navigateToCell1().getStation2Button(driver),
				 "Average Process Time");
	 }
	 
	 @Test
	 public void testCell1Station2ButtonContainsIdleTimeText() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkTextIsInButton(cellOverview.navigateToCell1().getStation2Button(driver),
				 "Average Idle Time");
	 }
	 
	 @Test
	 public void testCell1Station2ButtonContainsTaktTimeText() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkTextIsInButton(cellOverview.navigateToCell1().getStation2Button(driver),
				 "Takt Time");
	 }
	 
	 @Test
	 public void testCell1Station2ButtonContainsDefectText() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkTextIsInButton(cellOverview.navigateToCell1().getStation2Button(driver),
				 "Daily Defects");
	 }
	 
	 
	 @Test
	 public void testCell1Station2ButtonContainsStatus() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkStatusIsInButton(cellOverview.navigateToCell1().getStation2Button(driver),
				 2);
	 }
	 //========================================================================================
	 @Test
	 public void testCell1Station3ButtonContainsTitle() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkTextIsInButton(cellOverview.navigateToCell1().getStation3Button(driver),
				 "Station 3");
	 }
	 
	 @Test
	 public void testCell1Station3ButtonContainsProcessTimeText() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkTextIsInButton(cellOverview.navigateToCell1().getStation3Button(driver),
				 "Average Process Time");
	 }
	 
	 @Test
	 public void testCell1Station3ButtonContainsIdleTimeText() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkTextIsInButton(cellOverview.navigateToCell1().getStation3Button(driver),
				 "Average Idle Time");
	 }
	 
	 @Test
	 public void testCell1Station3ButtonContainsTaktTimeText() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkTextIsInButton(cellOverview.navigateToCell1().getStation3Button(driver),
				 "Takt Time");
	 }
	 
	 @Test
	 public void testCell1Station3ButtonContainsDefectText() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkTextIsInButton(cellOverview.navigateToCell1().getStation3Button(driver),
				 "Daily Defects");
	 }
	 
	 
	 @Test
	 public void testCell1Station3ButtonContainsStatus() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkStatusIsInButton(cellOverview.navigateToCell1().getStation3Button(driver),
				 3);
	 }
	 //=============================================================================
	 @Test
	 public void testCell1Station4ButtonContainsTitle() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkTextIsInButton(cellOverview.navigateToCell1().getStation4Button(driver),
				 "Station 4");
	 }
	 
	 @Test
	 public void testCell1Station4ButtonContainsProcessTimeText() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkTextIsInButton(cellOverview.navigateToCell1().getStation4Button(driver),
				 "Average Process Time");
	 }
	 
	 @Test
	 public void testCell1Station4ButtonContainsIdleTimeText() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkTextIsInButton(cellOverview.navigateToCell1().getStation4Button(driver),
				 "Average Idle Time");
	 }
	 
	 @Test
	 public void testCell1Station4ButtonContainsTaktTimeText() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkTextIsInButton(cellOverview.navigateToCell1().getStation4Button(driver),
				 "Takt Time");
	 }
	 
	 @Test
	 public void testCell1Station4ButtonContainsDefectText() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkTextIsInButton(cellOverview.navigateToCell1().getStation4Button(driver),
				 "Daily Defects");
	 }
	 
	 
	 @Test
	 public void testCell1Station4ButtonContainsStatus() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkStatusIsInButton(cellOverview.navigateToCell1().getStation4Button(driver),
				 4);
	 }
	 //================================================================================
	 @Test
	 public void testCell1Station5ButtonContainsTitle() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkTextIsInButton(cellOverview.navigateToCell1().getStation5Button(driver),
				 "Station 5");
	 }
	 
	 @Test
	 public void testCell1Station5ButtonContainsProcessTimeText() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkTextIsInButton(cellOverview.navigateToCell1().getStation5Button(driver),
				 "Average Process Time");
	 }
	 
	 @Test
	 public void testCell1Station5ButtonContainsIdleTimeText() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkTextIsInButton(cellOverview.navigateToCell1().getStation5Button(driver),
				 "Average Idle Time");
	 }
	 
	 @Test
	 public void testCell1Station5ButtonContainsTaktTimeText() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkTextIsInButton(cellOverview.navigateToCell1().getStation5Button(driver),
				 "Takt Time");
	 }
	 
	 @Test
	 public void testCell1Station5ButtonContainsDefectText() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkTextIsInButton(cellOverview.navigateToCell1().getStation5Button(driver),
				 "Daily Defects");
	 }
	 
	 
	 @Test
	 public void testCell1Station5ButtonContainsStatus() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkStatusIsInButton(cellOverview.navigateToCell1().getStation5Button(driver),
				 5);
	 }
	 //=======================================================================================
	 @Test
	 public void testCell2OverallButtonContainsTitle() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkTextIsInButton(cellOverview.navigateToCell2().getOverallButton(driver),
				 "Overall");
	 }
	 
	 @Test
	 public void testCell2OverallButtonContainsProcessTimeText() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkTextIsInButton(cellOverview.navigateToCell2().getOverallButton(driver),
				 "Average Process Time");
	 }
	 
	 @Test
	 public void testCell2OverallButtonContainsIdleTimeText() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkTextIsInButton(cellOverview.navigateToCell2().getOverallButton(driver),
				 "Average Idle Time");
	 }
	 
	 @Test
	 public void testCell2StationOverallButtonContainsTaktTimeText() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkTextIsInButton(cellOverview.navigateToCell2().getOverallButton(driver),
				 "Takt Time");
	 }
	 
	 @Test
	 public void testCell2StationOverallButtonContainsDefectText() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkTextIsInButton(cellOverview.navigateToCell2().getOverallButton(driver),
				 "Daily Defects");
	 }
	 
	 @Test
	 public void testCell2OverallButtonContainsBottleneckText() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkTextIsInButton(cellOverview.navigateToCell2().getOverallButton(driver),
				 "Bottleneck Station");
	 }
	 
	 @Test
	 public void testCell2StationOverallButtonContainsStatus() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkStatusIsInButton(cellOverview.navigateToCell2().getOverallButton(driver),
				 0);
	 }
	 //=======================================================================================
	 @Test
	 public void testCell2Station1ButtonContainsTitle() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkTextIsInButton(cellOverview.navigateToCell2().getStation1Button(driver),
				 "Station 1");
	 }
	 
	 @Test
	 public void testCell2Station1ButtonContainsProcessTimeText() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkTextIsInButton(cellOverview.navigateToCell2().getStation1Button(driver),
				 "Average Process Time");
	 }
	 
	 @Test
	 public void testCell2Station1ButtonContainsIdleTimeText() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkTextIsInButton(cellOverview.navigateToCell2().getStation1Button(driver),
				 "Average Idle Time");
	 }
	 
	 @Test
	 public void testCell2Station1ButtonContainsTaktTimeText() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkTextIsInButton(cellOverview.navigateToCell2().getStation1Button(driver),
				 "Takt Time");
	 }
	 
	 @Test
	 public void testCell2Station1ButtonContainsDefectText() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkTextIsInButton(cellOverview.navigateToCell2().getStation1Button(driver),
				 "Daily Defects");
	 }
	 
	 
	 @Test
	 public void testCell2Station1ButtonContainsStatus() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkStatusIsInButton(cellOverview.navigateToCell2().getStation1Button(driver),
				 1);
	 }
	 //=======================================================================================
	 @Test
	 public void testCell2Station2ButtonContainsTitle() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkTextIsInButton(cellOverview.navigateToCell2().getStation2Button(driver),
				 "Station 2");
	 }
	 
	 @Test
	 public void testCell2Station2ButtonContainsProcessTimeText() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkTextIsInButton(cellOverview.navigateToCell2().getStation2Button(driver),
				 "Average Process Time");
	 }
	 
	 @Test
	 public void testCell2Station2ButtonContainsIdleTimeText() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkTextIsInButton(cellOverview.navigateToCell2().getStation2Button(driver),
				 "Average Idle Time");
	 }
	 
	 @Test
	 public void testCell2Station2ButtonContainsTaktTimeText() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkTextIsInButton(cellOverview.navigateToCell2().getStation2Button(driver),
				 "Takt Time");
	 }
	 
	 @Test
	 public void testCell2Station2ButtonContainsDefectText() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkTextIsInButton(cellOverview.navigateToCell2().getStation2Button(driver),
				 "Daily Defects");
	 }
	 
	 
	 @Test
	 public void testCell2Station2ButtonContainsStatus() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkStatusIsInButton(cellOverview.navigateToCell2().getStation2Button(driver),
				 2);
	 }
	 //======================================================================================
	 @Test
	 public void testCell2Station3ButtonContainsTitle() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkTextIsInButton(cellOverview.navigateToCell2().getStation3Button(driver),
				 "Station 3");
	 }
	 
	 @Test
	 public void testCell2Station3ButtonContainsProcessTimeText() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkTextIsInButton(cellOverview.navigateToCell2().getStation3Button(driver),
				 "Average Process Time");
	 }
	 
	 @Test
	 public void testCell2Station3ButtonContainsIdleTimeText() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkTextIsInButton(cellOverview.navigateToCell2().getStation3Button(driver),
				 "Average Idle Time");
	 }
	 
	 @Test
	 public void testCell2Station3ButtonContainsTaktTimeText() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkTextIsInButton(cellOverview.navigateToCell2().getStation3Button(driver),
				 "Takt Time");
	 }
	 
	 @Test
	 public void testCell2Station3ButtonContainsDefectText() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkTextIsInButton(cellOverview.navigateToCell2().getStation3Button(driver),
				 "Daily Defects");
	 }
	 
	 
	 @Test
	 public void testCell2Station3ButtonContainsStatus() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkStatusIsInButton(cellOverview.navigateToCell2().getStation3Button(driver),
				 3);
	 }
	 //============================================================================================
	 @Test
	 public void testCell2Station4ButtonContainsTitle() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkTextIsInButton(cellOverview.navigateToCell2().getStation4Button(driver),
				 "Station 4");
	 }
	 
	 @Test
	 public void testCell2Station4ButtonContainsProcessTimeText() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkTextIsInButton(cellOverview.navigateToCell2().getStation4Button(driver),
				 "Average Process Time");
	 }
	 
	 @Test
	 public void testCell2Station4ButtonContainsIdleTimeText() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkTextIsInButton(cellOverview.navigateToCell2().getStation4Button(driver),
				 "Average Idle Time");
	 }
	 
	 @Test
	 public void testCell2Station4ButtonContainsTaktTimeText() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkTextIsInButton(cellOverview.navigateToCell2().getStation4Button(driver),
				 "Takt Time");
	 }
	 
	 @Test
	 public void testCell2Station4ButtonContainsDefectText() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkTextIsInButton(cellOverview.navigateToCell2().getStation4Button(driver),
				 "Daily Defects");
	 }
	 
	 
	 @Test
	 public void testCell2Station4ButtonContainsStatus() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkStatusIsInButton(cellOverview.navigateToCell2().getStation4Button(driver),
				 4);
	 }
	 //==================================================================================
	 @Test
	 public void testCell2Station5ButtonContainsTitle() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkTextIsInButton(cellOverview.navigateToCell2().getStation5Button(driver),
				 "Station 5");
	 }
	 
	 @Test
	 public void testCell2Station5ButtonContainsProcessTimeText() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkTextIsInButton(cellOverview.navigateToCell2().getStation5Button(driver),
				 "Average Process Time");
	 }
	 
	 @Test
	 public void testCell2Station5ButtonContainsIdleTimeText() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkTextIsInButton(cellOverview.navigateToCell2().getStation5Button(driver),
				 "Average Idle Time");
	 }
	 
	 @Test
	 public void testCell2Station5ButtonContainsTaktTimeText() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkTextIsInButton(cellOverview.navigateToCell2().getStation5Button(driver),
				 "Takt Time");
	 }
	 
	 @Test
	 public void testCell2Station5ButtonContainsDefectText() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkTextIsInButton(cellOverview.navigateToCell2().getStation5Button(driver),
				 "Daily Defects");
	 }
	 
	 
	 @Test
	 public void testCell2Station5ButtonContainsStatus() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkStatusIsInButton(cellOverview.navigateToCell2().getStation5Button(driver),
				 5);
	 }
	 //==================================================================================
	 @Test
	 public void testCell3OverallButtonContainsTitle() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkTextIsInButton(cellOverview.navigateToCell3().getOverallButton(driver),
				 "Overall");
	 }
	 
	 @Test
	 public void testCell3OverallButtonContainsProcessTimeText() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkTextIsInButton(cellOverview.navigateToCell3().getOverallButton(driver),
				 "Average Process Time");
	 }
	 
	 @Test
	 public void testCell3OverallButtonContainsIdleTimeText() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkTextIsInButton(cellOverview.navigateToCell3().getOverallButton(driver),
				 "Average Idle Time");
	 }
	 
	 @Test
	 public void testCell3StationOverallButtonContainsTaktTimeText() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkTextIsInButton(cellOverview.navigateToCell3().getOverallButton(driver),
				 "Takt Time");
	 }
	 
	 @Test
	 public void testCell3StationOverallButtonContainsDefectText() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkTextIsInButton(cellOverview.navigateToCell3().getOverallButton(driver),
				 "Daily Defects");
	 }
	 
	 @Test
	 public void testCell3OverallButtonContainsBottleneckText() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkTextIsInButton(cellOverview.navigateToCell3().getOverallButton(driver),
				 "Bottleneck Station");
	 }
	 
	 @Test
	 public void testCell3StationOverallButtonContainsStatus() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkStatusIsInButton(cellOverview.navigateToCell3().getOverallButton(driver),
				 0);
	 }
	 //===================================================================================
	 @Test
	 public void testCell3Station1ButtonContainsTitle() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkTextIsInButton(cellOverview.navigateToCell3().getStation1Button(driver),
				 "Station 1");
	 }
	 
	 @Test
	 public void testCell3Station1ButtonContainsProcessTimeText() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkTextIsInButton(cellOverview.navigateToCell3().getStation1Button(driver),
				 "Average Process Time");
	 }
	 
	 @Test
	 public void testCell3Station1ButtonContainsIdleTimeText() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkTextIsInButton(cellOverview.navigateToCell3().getStation1Button(driver),
				 "Average Idle Time");
	 }
	 
	 @Test
	 public void testCell3Station1ButtonContainsTaktTimeText() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkTextIsInButton(cellOverview.navigateToCell3().getStation1Button(driver),
				 "Takt Time");
	 }
	 
	 @Test
	 public void testCell3Station1ButtonContainsDefectText() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkTextIsInButton(cellOverview.navigateToCell3().getStation1Button(driver),
				 "Daily Defects");
	 }
	 
	 
	 @Test
	 public void testCell3Station1ButtonContainsStatus() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkStatusIsInButton(cellOverview.navigateToCell3().getStation1Button(driver),
				 1);
	 }
	 //=================================================================================
	 @Test
	 public void testCell3Station2ButtonContainsTitle() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkTextIsInButton(cellOverview.navigateToCell3().getStation2Button(driver),
				 "Station 2");
	 }
	 
	 @Test
	 public void testCell3Station2ButtonContainsProcessTimeText() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkTextIsInButton(cellOverview.navigateToCell3().getStation2Button(driver),
				 "Average Process Time");
	 }
	 
	 @Test
	 public void testCell3Station2ButtonContainsIdleTimeText() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkTextIsInButton(cellOverview.navigateToCell3().getStation2Button(driver),
				 "Average Idle Time");
	 }
	 
	 @Test
	 public void testCell3Station2ButtonContainsTaktTimeText() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkTextIsInButton(cellOverview.navigateToCell3().getStation2Button(driver),
				 "Takt Time");
	 }
	 
	 @Test
	 public void testCell3Station2ButtonContainsDefectText() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkTextIsInButton(cellOverview.navigateToCell3().getStation2Button(driver),
				 "Daily Defects");
	 }
	 
	 
	 @Test
	 public void testCell3Station2ButtonContainsStatus() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkStatusIsInButton(cellOverview.navigateToCell3().getStation2Button(driver),
				 2);
	 }
	 //=================================================================================
	 @Test
	 public void testCell3Station3ButtonContainsTitle() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkTextIsInButton(cellOverview.navigateToCell3().getStation3Button(driver),
				 "Station 3");
	 }
	 
	 @Test
	 public void testCell3Station3ButtonContainsProcessTimeText() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkTextIsInButton(cellOverview.navigateToCell3().getStation3Button(driver),
				 "Average Process Time");
	 }
	 
	 @Test
	 public void testCell3Station3ButtonContainsIdleTimeText() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkTextIsInButton(cellOverview.navigateToCell3().getStation3Button(driver),
				 "Average Idle Time");
	 }
	 
	 @Test
	 public void testCell3Station3ButtonContainsTaktTimeText() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkTextIsInButton(cellOverview.navigateToCell3().getStation3Button(driver),
				 "Takt Time");
	 }
	 
	 @Test
	 public void testCell3Station3ButtonContainsDefectText() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkTextIsInButton(cellOverview.navigateToCell3().getStation3Button(driver),
				 "Daily Defects");
	 }
	 
	 
	 @Test
	 public void testCell3Station3ButtonContainsStatus() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkStatusIsInButton(cellOverview.navigateToCell3().getStation3Button(driver),
				 3);
	 }
	 //================================================================================
	 @Test
	 public void testCell3Station4ButtonContainsTitle() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkTextIsInButton(cellOverview.navigateToCell3().getStation4Button(driver),
				 "Station 4");
	 }
	 
	 @Test
	 public void testCell3Station4ButtonContainsProcessTimeText() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkTextIsInButton(cellOverview.navigateToCell3().getStation4Button(driver),
				 "Average Process Time");
	 }
	 
	 @Test
	 public void testCell3Station4ButtonContainsIdleTimeText() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkTextIsInButton(cellOverview.navigateToCell3().getStation4Button(driver),
				 "Average Idle Time");
	 }
	 
	 @Test
	 public void testCell3Station4ButtonContainsTaktTimeText() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkTextIsInButton(cellOverview.navigateToCell3().getStation4Button(driver),
				 "Takt Time");
	 }
	 
	 @Test
	 public void testCell3Station4ButtonContainsDefectText() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkTextIsInButton(cellOverview.navigateToCell3().getStation4Button(driver),
				 "Daily Defects");
	 }
	 
	 
	 @Test
	 public void testCell3Station4ButtonContainsStatus() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkStatusIsInButton(cellOverview.navigateToCell3().getStation4Button(driver),
				 4);
	 }
	 //=================================================================================
	 @Test
	 public void testCell3Station5ButtonContainsTitle() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkTextIsInButton(cellOverview.navigateToCell3().getStation5Button(driver),
				 "Station 5");
	 }
	 
	 @Test
	 public void testCell3Station5ButtonContainsProcessTimeText() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkTextIsInButton(cellOverview.navigateToCell3().getStation5Button(driver),
				 "Average Process Time");
	 }
	 
	 @Test
	 public void testCell3Station5ButtonContainsIdleTimeText() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkTextIsInButton(cellOverview.navigateToCell3().getStation5Button(driver),
				 "Average Idle Time");
	 }
	 
	 @Test
	 public void testCell3Station5ButtonContainsTaktTimeText() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkTextIsInButton(cellOverview.navigateToCell3().getStation5Button(driver),
				 "Takt Time");
	 }
	 
	 @Test
	 public void testCell3Station5ButtonContainsDefectText() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkTextIsInButton(cellOverview.navigateToCell3().getStation5Button(driver),
				 "Daily Defects");
	 }
	 
	 
	 @Test
	 public void testCell3Station5ButtonContainsStatus() throws Exception
	 {
		 LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		 CellDisplayStructure.checkStatusIsInButton(cellOverview.navigateToCell3().getStation5Button(driver),
				 5);
	 }
	 //==================================================================================
	 @After
	  public void tearDown() throws Exception {
	    driver.quit();
	    String verificationErrorString = verificationErrors.toString();
	    if (!"".equals(verificationErrorString)) {
	      fail(verificationErrorString);
	    }
	  }
}

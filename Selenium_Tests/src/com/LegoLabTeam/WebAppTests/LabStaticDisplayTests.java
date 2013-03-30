package com.LegoLabTeam.WebAppTests;

import java.util.concurrent.TimeUnit;

import org.junit.After;
import org.junit.Before;
import org.junit.Test;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.firefox.FirefoxDriver;

import junit.framework.TestCase;

public class LabStaticDisplayTests extends TestCase
{
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
	public void testCell1ButtonTitle() throws Exception
	{
		LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		cellOverview.checkTitleIsInButton(1, "Cell1");
	}
	
	@Test
	public void testCell1ButtonStation1Status() throws Exception
	{
		LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		cellOverview.checkStationStatusIsInButton(1, 1);
	}
	
	@Test
	public void testCell1ButtonStation2Status() throws Exception
	{
		LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		cellOverview.checkStationStatusIsInButton(1, 2);
	}
	
	
	@Test
	public void testCell1ButtonStation3Status() throws Exception
	{
		LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		cellOverview.checkStationStatusIsInButton(1, 3);
	}
	
	
	@Test
	public void testCell1ButtonStation4Status() throws Exception
	{
		LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		cellOverview.checkStationStatusIsInButton(1, 4);
	}
	
	
	@Test
	public void testCell1ButtonStation5Status() throws Exception
	{
		LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		cellOverview.checkStationStatusIsInButton(1, 5);
	}
	//=======================================================================
	@Test
	public void testCell2ButtonTitle() throws Exception
	{
		LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		cellOverview.checkTitleIsInButton(2, "Cell2");
	}
	
	@Test
	public void testCell2ButtonStation1Status() throws Exception
	{
		LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		cellOverview.checkStationStatusIsInButton(2, 1);
	}
	
	@Test
	public void testCell2ButtonStation2Status() throws Exception
	{
		LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		cellOverview.checkStationStatusIsInButton(2, 2);
	}
	
	
	@Test
	public void testCell2ButtonStation3Status() throws Exception
	{
		LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		cellOverview.checkStationStatusIsInButton(2, 3);
	}
	
	
	@Test
	public void testCell2ButtonStation4Status() throws Exception
	{
		LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		cellOverview.checkStationStatusIsInButton(2, 4);
	}
	
	
	@Test
	public void testCell2ButtonStation5Status() throws Exception
	{
		LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		cellOverview.checkStationStatusIsInButton(2, 5);
	}
	//==================================================================================
	@Test
	public void testCell3ButtonTitle() throws Exception
	{
		LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		cellOverview.checkTitleIsInButton(3, "Cell3");
	}
	
	@Test
	public void testCell3ButtonStation1Status() throws Exception
	{
		LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		cellOverview.checkStationStatusIsInButton(3, 1);
	}
	
	@Test
	public void testCell3ButtonStation2Status() throws Exception
	{
		LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		cellOverview.checkStationStatusIsInButton(3, 2);
	}
	
	
	@Test
	public void testCell3ButtonStation3Status() throws Exception
	{
		LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		cellOverview.checkStationStatusIsInButton(3, 3);
	}
	
	
	@Test
	public void testCell3ButtonStation4Status() throws Exception
	{
		LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		cellOverview.checkStationStatusIsInButton(3, 4);
	}
	
	
	@Test
	public void testCell3ButtonStation5Status() throws Exception
	{
		LabDisplayPageObject cellOverview = LabDisplayPageObject.navigateToSelf(driver, baseUrl);
		cellOverview.checkStationStatusIsInButton(3, 5);
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

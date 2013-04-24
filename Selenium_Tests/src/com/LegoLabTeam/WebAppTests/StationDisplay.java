package com.LegoLabTeam.WebAppTests;

import java.util.regex.Matcher;
import java.util.regex.Pattern;
import org.junit.*;
import static org.junit.Assert.*;
import static org.hamcrest.CoreMatchers.*;

import org.openqa.selenium.WebDriver;


/***
 * This class handles the action that is similar for station page
 * objects.  This class handles the higher level actions that are the same
 * for each page.
 * 
 * @author Zack Coker
 *
 */
abstract public class StationDisplay 
{
  protected WebDriver driver;
  //the title on the web page for the station
  protected String TITLE_STRING;
  //the number of the station
  protected int stationNumber;
  //the cell number for the station
  protected int cellNumber;
  
  /***
   * The constructor for the class
   * @param newDriver - the webdriver
   * @param title - the title of the page
   */
  public StationDisplay(WebDriver newDriver, String title, int stationNumber,
		  int cellNumber)
  {
	  driver = newDriver;
	  TITLE_STRING = title;
	  this.stationNumber = stationNumber;
	  this.cellNumber = cellNumber;
	  StationDisplayStructure.checkTitleLoaded(TITLE_STRING, driver);
  }
  
  /***
   * Checks the process string of the station pages
   * @throws Exception
   */
  public void checkProcessText() throws Exception
  {
	  StationDisplayStructure.checkForStringInPage(driver, "Average Process Time");
  }
  
  /***
   * Checks the daily defect string of the station pages
   * @throws Exception
   */
  public void checkDailyDefectText() throws Exception
  {
	  StationDisplayStructure.checkForStringInPage(driver, "Daily Defects");
  }
  
  /***
   * Checks the idle time of the station pages
   * @throws Exception
   */
  public void checkIdleTimeText() throws Exception
  {
	  StationDisplayStructure.checkForStringInPage(driver, "Average Idle Time");
  }
  
  /***
   * Checks the time since defect text of the station pages
   * @throws Exception
   */
  public void checkTimeSinceDefectText() throws Exception
  {
	  StationDisplayStructure.checkForStringInPage(driver, "Time Since Defect");
  }
  
  /***
   * Checks the cycle time string of the station pages
   * @throws Exception
   */
  public void checkCycleTimeText() throws Exception
  {
	  StationDisplayStructure.checkForStringInPage(driver, "Cycle Time");
  }
  
  /***
   * Checks the lead time string of the overall station pages
   * @throws Exception
   */
  public void checkLeadTimeText() throws Exception
  {
	  StationDisplayStructure.checkForStringInPage(driver, "Lead Time");
  }
  
  /***
   * Checks the process time graph of the station pages
   * @throws Exception
   */
  public void checkProcessTimesImage() throws Exception
  {
	  if(stationNumber == 0)
	  {
		  StationDisplayStructure.checkPictureDisplayedInPage(driver,"../../GUIGraphs/Cell"+cellNumber+
				  "OverallProcessGraph.png",0); 
	  }
	  else
	  {
	    StationDisplayStructure.checkPictureDisplayedInPage(driver,"../../GUIGraphs/Cell"+cellNumber
			  +"Station"+stationNumber+"ProcessGraph.png",0);
	  }
  }
  
  /***
   * Checks the idle time graph of the station pages
   * @throws Exception
   */
  public void checkIdleTimesImage() throws Exception
  {
	  if(stationNumber == 0)
	  {
		  StationDisplayStructure.checkPictureDisplayedInPage(driver,"../../GUIGraphs/Cell"+cellNumber+
				  "OverallIdleGraph.png",1); 
	  }
	  else if(stationNumber != 1)
	  {
	  StationDisplayStructure.checkPictureDisplayedInPage(driver,"../../GUIGraphs/Cell"+cellNumber+
			  "Station"+stationNumber+"IdleGraph.png",1);
	  }
  }
  
  /***
   * The abstract method for handling the back button click
   * @return: the page the button is navigating to
   */
  public abstract CellDisplay goBack();
}

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

  /***
   * The constructor for the class
   * @param newDriver - the webdriver
   * @param title - the title of the page
   */
  public StationDisplay(WebDriver newDriver, String title)
  {
	  driver = newDriver;
	  TITLE_STRING = title;
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
   * Checks the takt time sting of the station pages
   * @throws Exception
   */
  public void checkTaktText() throws Exception
  {
	  StationDisplayStructure.checkForStringInPage(driver, "Takt Time");
  }
  
  /***
   * Checks the process time graph of the station pages
   * @throws Exception
   */
  public void checkProcessTimesImage() throws Exception
  {
	  StationDisplayStructure.checkPictureDisplayedInPage(driver,"processtimes");
  }
  
  /***
   * Checks the idle time graph of the station pages
   * @throws Exception
   */
  public void checkIdleTimesImage() throws Exception
  {
	  StationDisplayStructure.checkPictureDisplayedInPage(driver,"idletimes");
  }
  
  /***
   * The abstract method for handling the back button click
   * @return: the page the button is navigating to
   */
  public abstract CellDisplay goBack();
}

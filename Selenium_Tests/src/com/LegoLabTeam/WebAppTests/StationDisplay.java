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
public class StationDisplay 
{
  protected WebDriver driver;
  //the title on the web page for the station
  protected String TITLE_STRING;
  protected final Pattern p = Pattern.compile("Cell (\\d)");
	
  public StationDisplay(WebDriver newDriver, String title)
  {
	  driver = newDriver;
	  TITLE_STRING = title;
	  StationDisplayStructure.checkTitleLoaded(TITLE_STRING, driver);
  }
  
  public void checkProcessText() throws Exception
  {
	  StationDisplayStructure.checkForStringInPage(driver, "Average Process Time");
  }
  
  public void checkDailyDefectText() throws Exception
  {
	  StationDisplayStructure.checkForStringInPage(driver, "Daily Defects");
  }
  
  public void checkIdleTimeText() throws Exception
  {
	  StationDisplayStructure.checkForStringInPage(driver, "Average Idle Time");
  }
  
  public void checkTimeSinceDefectText() throws Exception
  {
	  StationDisplayStructure.checkForStringInPage(driver, "Time Since Defect");
  }
  
  public void checkTaktText() throws Exception
  {
	  StationDisplayStructure.checkForStringInPage(driver, "Takt Time");
  }
  
  public void checkProcessTimesImage() throws Exception
  {
	  StationDisplayStructure.checkPictureDisplayedInPage(driver,"processtimes");
  }
  
  public void checkIdleTimesImage() throws Exception
  {
	  StationDisplayStructure.checkPictureDisplayedInPage(driver,"idletimes");
  }
  
  public <T extends CellDisplay> T goBack(WebDriver driver, Class<T> clazz)
  {
	  StationDisplayStructure.clickBackButton(driver);
	  Matcher m = p.matcher(TITLE_STRING);
	  assertTrue(m.find());
	  T result = null;
	  if(m.find())
	  {
		  
	  }
	  return result;
  }
}

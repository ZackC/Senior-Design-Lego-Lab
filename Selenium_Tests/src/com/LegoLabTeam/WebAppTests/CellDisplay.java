package com.LegoLabTeam.WebAppTests;

import java.lang.reflect.InvocationTargetException;

import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;

/***
 * The super class for the cell page objects
 * 
 * @author Zack Coker
 *
 */
public abstract class CellDisplay 
{
  protected final WebDriver driver;
  //the title of the cell
  protected final String CELL_TITLE;
  
  /***
   * The constructor for the class
   * @param newDriver - the webdriver
   * @param newTitle - the title on the page
   */
  public CellDisplay(WebDriver newDriver, String newTitle)
  {
	  driver = newDriver;
	  CELL_TITLE = newTitle;
	  CellDisplayStructure.checkTitleLoaded(CELL_TITLE, driver);
  }
  
  /***
   * Goes to a specific station based on an id in the button
   * which is computed by the station number value
   * @param stationDisplayClassToReturn - the class type to return
   * @param stationNumber - the station number to navigate to
   * @return - the station page object
   * @throws Exception
   */
  public StationDisplay goToStation(Class<? extends StationDisplay> stationDisplayClassToReturn,int stationNumber) throws Exception
  {
	/*if (stationNumber == 0)
	{
	  return CellDisplayStructure.navigateToStation(driver, stationDisplayClassToReturn, "overallProcessTime");
	}
	else
	{
	  return CellDisplayStructure.navigateToStation(driver, stationDisplayClassToReturn, "station"+stationNumber+"ProcessTime");
	}*/
	return CellDisplayStructure.navigateToStation(driver, stationDisplayClassToReturn, stationNumber); 
  }
  
  /**
   * Performs the navigation to a station number and returns an object of type clazz
   * @param clazz - the page object to return
   * @param stationNumber - the station that the page is going to
   * @return - the new page navigated to
   * @throws Exception
   */
  protected <T extends StationDisplay> T performNavigation(Class<T> clazz,int stationNumber) throws Exception
  {
	  StationDisplay station = goToStation(clazz,stationNumber);
		if(station != null && clazz.isInstance(station))
		{
			return clazz.cast(station);
		}
		else 
		{
			return null;
		}
  }
  
  //Handles navigating the overall station and returns the overall station's page object
  public abstract StationDisplay navigateToOverall() throws Exception;
  //Handles navigating the station 1 and returning station 5's page object
  public abstract StationDisplay navigateToStation1() throws Exception;
  //Handles navigating the station 2 and returning station 5's page object
  public abstract StationDisplay navigateToStation2() throws Exception;
  //Handles navigating the station 3 and returning station 5's page object
  public abstract StationDisplay navigateToStation3() throws Exception;
  //Handles navigating the station 4 and returning station 5's page object
  public abstract StationDisplay navigateToStation4() throws Exception;
  //Handles navigating the station 5 and returning station 5's page object
  public abstract StationDisplay navigateToStation5() throws Exception;
  
  /***
   * Returns the button based on the station number.  0 is for the overall button
   * 1 through 5 return buttons 1 through 5.
   * @param stationNumber - the station number of the button to return
   * @return - the button 
   */
  public WebElement getButton(int stationNumber)
  {
	  /*if (stationNumber == 0)
		{
		  return CellDisplayStructure.returnButton(driver, "overallProcessTime");
		}
		else
		{
		  return CellDisplayStructure.returnButton(driver, "station"+stationNumber+"ProcessTime");
		}
		*/
	  return CellDisplayStructure.returnButton(driver, stationNumber);
  }
  
  /***
   * Returns the overall button
   * @return - the overall button
   */
  public WebElement getOverallButton()
  {
	  return getButton(0);
  }
  
  /***
   * Returns the button at station 1
   * @return - the button at station 1
   */
  public WebElement getStation1Button()
  {
	  return getButton(1);
  }
  
  /***
   * Returns the button at station 2
   * @return - the button at station 2
   */
  public WebElement getStation2Button()
  {
	  return getButton(2);
  }
  
  /***
   * Returns the button at station 3
   *
   * @return - the button at station 3
   */
  public WebElement getStation3Button()
  {
	  return getButton(3);
  }
  
  /***
   * Returns the button at station 4
   * @return - the button at station 4
   */
  public WebElement getStation4Button()
  {
	  return getButton(4);
  }
  
  /**
   * Returns the station 5 button
   * @return - the button at station 5
   */
  public WebElement getStation5Button()
  {
	  return getButton(5);
  }
  
  /***
   * The method for going back from a cell display.
   * @return - the parent page object 
   */
  public LabDisplayPageObject goBack()
  {
     CellDisplayStructure.clickBackButton(driver);
     return new LabDisplayPageObject(driver);
  }
  
}

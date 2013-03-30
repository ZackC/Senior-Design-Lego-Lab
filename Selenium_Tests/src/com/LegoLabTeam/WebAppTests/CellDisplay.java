package com.LegoLabTeam.WebAppTests;

import java.lang.reflect.InvocationTargetException;

import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;

public abstract class CellDisplay 
{
  protected final WebDriver driver;
  protected final String CELL_TITLE;
  protected final int cellNumber;
  
  public CellDisplay(WebDriver newDriver, String newTitle,int newCellNumber)
  {
	  driver = newDriver;
	  CELL_TITLE = newTitle;
	  cellNumber = newCellNumber;
	  CellDisplayStructure.checkTitleLoaded(CELL_TITLE, driver);
  }
  
  public StationDisplay goToStation(Class<? extends StationDisplay> stationDisplayClassToReturn,int stationNumber) throws Exception
  {
	if (stationNumber == 0)
	{
	  return CellDisplayStructure.navigateToStation(driver, stationDisplayClassToReturn, "overallProcessTime");
	}
	else
	{
	  return CellDisplayStructure.navigateToStation(driver, stationDisplayClassToReturn, "station"+stationNumber+"ProcessTime");
	}
  }
  
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
  
  public abstract StationDisplay navigateToOverall() throws Exception;
  public abstract StationDisplay navigateToStation1() throws Exception;
  public abstract StationDisplay navigateToStation2() throws Exception;
  public abstract StationDisplay navigateToStation3() throws Exception;
  public abstract StationDisplay navigateToStation4() throws Exception;
  public abstract StationDisplay navigateToStation5() throws Exception;
  
  public WebElement getButton(WebDriver driver, int stationNumber)
  {
	  if (stationNumber == 0)
		{
		  return CellDisplayStructure.returnButton(driver, "overallProcessTime");
		}
		else
		{
		  return CellDisplayStructure.returnButton(driver, "station"+stationNumber+"ProcessTime");
		}
  }
  
  public WebElement getOverallButton(WebDriver driver)
  {
	  return getButton(driver,0);
  }
  
  public WebElement getStation1Button(WebDriver driver)
  {
	  return getButton(driver,1);
  }
  
  public WebElement getStation2Button(WebDriver driver)
  {
	  return getButton(driver,2);
  }
  
  public WebElement getStation3Button(WebDriver driver)
  {
	  return getButton(driver,3);
  }
  
  public WebElement getStation4Button(WebDriver driver)
  {
	  return getButton(driver,4);
  }
  
  public WebElement getStation5Button(WebDriver driver)
  {
	  return getButton(driver,5);
  }
  
  public LabDisplayPageObject goBack(WebDriver driver)
  {
     CellDisplayStructure.clickBackButton(driver);
     return new LabDisplayPageObject(driver);
  }
  
}

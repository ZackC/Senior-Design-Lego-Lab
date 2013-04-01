package com.LegoLabTeam.WebAppTests;

import org.openqa.selenium.WebDriver;
/***
 * This class is for stations that are navigated to from cell 1
 * @author Zack Coker
 *
 */
public class StationsForCell1PageObject extends StationDisplay
{
	
  public StationsForCell1PageObject(WebDriver driver, String title)
  {
	  super(driver, title);
  }
  
  /***
   * This method defines how to go back to cell 1
   */
  public Cell1DisplayPageObject goBack()
  {
	  StationDisplayStructure.clickBackButton(driver);
	  return new Cell1DisplayPageObject(driver);
  }
  
  
  
}

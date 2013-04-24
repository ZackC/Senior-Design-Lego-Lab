package com.LegoLabTeam.WebAppTests;

import org.openqa.selenium.WebDriver;
/***
 * This class is for stations that are navigated to from cell 3
 * @author zack
 *
 */
public class StationsForCell3PageObject extends StationDisplay{

	
	public StationsForCell3PageObject(WebDriver driver, String title, int stationNumber)
	{
		super(driver, title, stationNumber, 3);
	}
	/***
	 * This method defines how to go back to cell 3
	 */
	  public Cell3DisplayPageObject goBack()
	  {
		  StationDisplayStructure.clickBackButton(driver);
		  return new Cell3DisplayPageObject(driver);
	  }
}

package com.LegoLabTeam.WebAppTests;

import java.util.concurrent.TimeUnit;

import org.openqa.selenium.WebDriver;
import org.openqa.selenium.support.ui.ExpectedConditions;
import org.openqa.selenium.support.ui.FluentWait;
import org.openqa.selenium.support.ui.Wait;
/***
 * The page object for cell 3
 * @author Zack Coker
 *
 */
public class Cell3DisplayPageObject extends CellDisplay{
	/***
	 * uses the super constructor to verify the title of the page this constructor 
	 * provides
	 * @param newDriver - the web driver
	 */
	  public Cell3DisplayPageObject(WebDriver newDriver)
	  {
		  super(newDriver,"Tiger Automotive Lab: Cell 3");  
	  }

  /***
   * The method for navigating to the overall station from this cell
   */
	@Override
	public Cell3OverallStationPageObject navigateToOverall() throws Exception {
		return performNavigation(Cell3OverallStationPageObject.class,0);
	}
	  
	/***
	 * The method for navigating to station 1 from this cell
	 */
	@Override
	public Cell3Station1PageObject navigateToStation1() throws Exception {
		return performNavigation(Cell3Station1PageObject.class,1);
	}

	/***
	 * The method for navigating to station 2 from this cell
	 */
	@Override
	public Cell3Station2PageObject navigateToStation2() throws Exception {
		return performNavigation(Cell3Station2PageObject.class,2);
	}

	/***
	 * The method for navigating to station 3 from this cell
	 */
	@Override
	public Cell3Station3PageObject navigateToStation3() throws Exception {
		return performNavigation(Cell3Station3PageObject.class,3);
	}

	/***
	 * The method for navigating to station 4 from this cell
	 */
	@Override
	public Cell3Station4PageObject navigateToStation4() throws Exception {
		return performNavigation(Cell3Station4PageObject.class,4);
	}

	/***
	 * The method for navigating that station 5 from this cell
	 */
	@Override
	public Cell3Station5PageObject navigateToStation5() throws Exception {
		return performNavigation(Cell3Station5PageObject.class,5);
	}
}

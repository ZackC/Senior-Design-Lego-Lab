package com.LegoLabTeam.WebAppTests;

import java.util.concurrent.TimeUnit;

import org.openqa.selenium.WebDriver;
import org.openqa.selenium.support.ui.ExpectedConditions;
import org.openqa.selenium.support.ui.FluentWait;
import org.openqa.selenium.support.ui.Wait;
/***
 * The page object for the cell 2 class
 * @author Zack Coker
 *
 */
public class Cell2DisplayPageObject extends CellDisplay{

	/***
	 * uses the super constructor to verify the title of the page this constructor 
	 * provides
	 * @param newDriver - the web driver
	 */
	  public Cell2DisplayPageObject(WebDriver newDriver)
	  {
		  super(newDriver,"Tiger Automotive Lab: Cell 2"); 
	  }

	  /***
	   * The method for navigating to the overall station
	   */
	  @Override
		public Cell2OverallStationPageObject navigateToOverall() throws Exception {
			return performNavigation(Cell2OverallStationPageObject.class,0);
		}  
	  
	/***
	 * The method for navigating to station 1  
	 */
	@Override
	public Cell2Station1PageObject navigateToStation1() throws Exception {
		return performNavigation(Cell2Station1PageObject.class,1);
	}

	/***
	 * The method for navigating to station 2
	 */
	@Override
	public Cell2Station2PageObject navigateToStation2() throws Exception {
		return performNavigation(Cell2Station2PageObject.class,2);
	}

	/***
	 * The method for navigating to station 3
	 */
	@Override
	public Cell2Station3PageObject navigateToStation3() throws Exception {
		return performNavigation(Cell2Station3PageObject.class,3);
	}

	/***
	 * The method for navigating to station 4
	 */
	@Override
	public Cell2Station4PageObject navigateToStation4() throws Exception {
		return performNavigation(Cell2Station4PageObject.class,4);
	}

	/***
	 * The method for navigating to station 5
	 */
	@Override
	public Cell2Station5PageObject navigateToStation5() throws Exception {
		return performNavigation(Cell2Station5PageObject.class,5);
	}
}

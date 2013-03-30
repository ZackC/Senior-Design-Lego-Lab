package com.LegoLabTeam.WebAppTests;

import java.util.concurrent.TimeUnit;

import org.openqa.selenium.WebDriver;
import org.openqa.selenium.support.ui.ExpectedConditions;
import org.openqa.selenium.support.ui.FluentWait;
import org.openqa.selenium.support.ui.Wait;

public class Cell3DisplayPageObject extends CellDisplay{
	
	  public Cell3DisplayPageObject(WebDriver newDriver)
	  {
		  super(newDriver,"Tiger Automotive Lab: Cell 3",3);  
	  }

	@Override
	public Cell3OverallStationPageObject navigateToOverall() throws Exception {
		return performNavigation(Cell3OverallStationPageObject.class,0);
	}
	  
	@Override
	public Cell3Station1PageObject navigateToStation1() throws Exception {
		return performNavigation(Cell3Station1PageObject.class,1);
	}

	@Override
	public Cell3Station2PageObject navigateToStation2() throws Exception {
		return performNavigation(Cell3Station2PageObject.class,2);
	}

	@Override
	public Cell3Station3PageObject navigateToStation3() throws Exception {
		return performNavigation(Cell3Station3PageObject.class,3);
	}

	@Override
	public Cell3Station4PageObject navigateToStation4() throws Exception {
		return performNavigation(Cell3Station4PageObject.class,4);
	}

	@Override
	public Cell3Station5PageObject navigateToStation5() throws Exception {
		return performNavigation(Cell3Station5PageObject.class,5);
	}
}

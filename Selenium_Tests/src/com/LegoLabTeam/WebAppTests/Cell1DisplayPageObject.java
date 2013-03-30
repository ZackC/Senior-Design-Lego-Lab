package com.LegoLabTeam.WebAppTests;

import java.util.concurrent.TimeUnit;

import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.internal.FindsById;
import org.openqa.selenium.support.ui.ExpectedConditions;
import org.openqa.selenium.support.ui.FluentWait;
import org.openqa.selenium.support.ui.Wait;

public class Cell1DisplayPageObject extends CellDisplay
{

	
  public Cell1DisplayPageObject(WebDriver newDriver)
  {
	  super(newDriver,"Tiger Automotive Lab: Cell 1",1); 
        
  }
  
  @Override
	public Cell1OverallStationPageObject navigateToOverall() throws Exception {
		return performNavigation(Cell1OverallStationPageObject.class,0);
	}

@Override
public Cell1Station1PageObject navigateToStation1() throws Exception 
{
	return performNavigation(Cell1Station1PageObject.class,1);
}      
		  
		  
		  

@Override
public Cell1Station2PageObject navigateToStation2() throws Exception {
	return performNavigation(Cell1Station2PageObject.class,2);
}

@Override
public Cell1Station3PageObject navigateToStation3() throws Exception {
	return performNavigation(Cell1Station3PageObject.class,3);
}

@Override
public Cell1Station4PageObject navigateToStation4() throws Exception {
	return performNavigation(Cell1Station4PageObject.class,4);
}

@Override
public Cell1Station5PageObject navigateToStation5() throws Exception {
	return performNavigation(Cell1Station5PageObject.class,5);
}



}

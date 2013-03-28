package com.LegoLabTeam.WebAppTests;

import java.util.concurrent.TimeUnit;

import org.openqa.selenium.WebDriver;
import org.openqa.selenium.support.ui.ExpectedConditions;
import org.openqa.selenium.support.ui.FluentWait;
import org.openqa.selenium.support.ui.Wait;

public class Cell3DisplayPageObject {
	final WebDriver driver;
	
	  public Cell3DisplayPageObject(WebDriver newDriver)
	  {
		  driver = newDriver;  
	      Wait<WebDriver> wait = new FluentWait<WebDriver>(driver)  
	         .withTimeout(20, TimeUnit.SECONDS)  
	         .pollingEvery(2, TimeUnit.SECONDS);  

	      wait.until(ExpectedConditions.titleIs("Tiger Automotive Lab: Cell 3"));  
	  }

}

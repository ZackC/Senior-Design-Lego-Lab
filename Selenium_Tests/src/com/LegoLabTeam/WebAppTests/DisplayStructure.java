package com.LegoLabTeam.WebAppTests;

import java.util.concurrent.TimeUnit;

import org.openqa.selenium.WebDriver;
import org.openqa.selenium.support.ui.ExpectedConditions;
import org.openqa.selenium.support.ui.FluentWait;
import org.openqa.selenium.support.ui.Wait;

public class DisplayStructure {

	public static void checkTitleLoaded(String title, WebDriver driver)
	  {
		  Wait<WebDriver> wait = new FluentWait<WebDriver>(driver)  
			         .withTimeout(30, TimeUnit.SECONDS)  
			         .pollingEvery(2, TimeUnit.SECONDS);  

			      wait.until(ExpectedConditions.titleIs(title));
	  }
}

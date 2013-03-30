package com.LegoLabTeam.WebAppTests;

import java.lang.reflect.InvocationTargetException;
import java.util.concurrent.TimeUnit;

import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.support.ui.ExpectedConditions;
import org.openqa.selenium.support.ui.FluentWait;
import org.openqa.selenium.support.ui.Wait;
import org.junit.*;
import static org.junit.Assert.*;
import static org.hamcrest.CoreMatchers.*;

public class CellDisplayStructure extends DisplayStructure
{
	public static StationDisplay navigateToStation(WebDriver driver, Class<? extends StationDisplay> stationDisplayClassToReturn, String idString) throws Exception
	{
	  returnButton(driver,idString).click();
	  return stationDisplayClassToReturn.getDeclaredConstructor(WebDriver.class).newInstance(driver);

	}
	
	public static WebElement returnButton(WebDriver driver, String idString)
	{
		return driver.findElement(By.id(idString)).findElement(By.xpath("ancestor::a"));
	}
	
	public static void checkTextIsInButton(WebElement button, String text) throws Exception
	{
		assertTrue(button.getText().contains(text));
	}
	
	private static void checkButtonContainsStatus(WebElement button, String id) throws Exception
	{
	   assertTrue(button.findElement(By.id(id)).isEnabled());
	}
	
	public static void checkStatusIsInButton(WebElement button, int stationNumber) throws Exception
	{
	  if (stationNumber == 0)
	  {
	    checkButtonContainsStatus(button, "overallStatus");
	  }
	  else
	  {
	     checkButtonContainsStatus(button, "station"+stationNumber+"Status");
	  }
	}
	
	public static void clickBackButton(WebDriver driver)
	{
		driver.findElement(By.cssSelector("span.ui-btn-text")).click();
	}
}
